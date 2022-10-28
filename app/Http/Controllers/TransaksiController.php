<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Detail_Transaksi;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->paket = new Paket();
        $this->customer = new Customer();
        $this->transaksi = new Transaksi();
        $this->detail_transaksi = new Detail_Transaksi();
    }


    public function index()
    {
       return view('admin.transaksis.transaksi', [
        'transaksis' => Transaksi::get(),
        'title' => 'Transaksi'
       ]);
    }

    public function history()
    {
        return view('admin.transaksis.history');
    }

    public function source($status)
    {
        $query = Transaksi::query();
        $query->where('status', $status);
        $query->orderBy('tgl', 'desc');
        return DataTables::elloquent($query)
        ->filter(function ($query) {
            if (request()->hash('search')) {
                $query->whereHas('customer', function($q) {
                    $q->where('nama', 'LIKE', '%' . request('search')['value']. '%');
                });
            }
        })
        ->addColumn('no_invoice', function($data) {
            return $data->no_invoice;
        })
        ->addColumn('tgl', function($data) {
            return Carbon::parse($data->tgl)->format('d-m-y');
        })
        ->addColumn('time', function ($data) {
            return Carbon::parse($data->date)->format('H:i:s');
        })
        ->addColumn('customer',  function ($data) {
            return title_case($data->customer->nama);
        })
        ->addColumn('outlet', function ($data) {
            return title_case($data->outlet->nama_outlet);
        })
        ->addColumn('jumlah_bayar', function($data) {
            return number_format($data->amount,0,',','.');
        })
        ->addColumn('status', function ($data) {
            return $data->status == 'proses' ? '<span class="badge badge-danger">'.$data->status.'</span>':'<span class="badge badge-success">'.$data->status.'</span>';
        })
        ->addIndexColumn()
        ->rawColumns(['status'])
        ->toJson();
    }

    public function create()
    {
       return view('admin.transaksis.create', [
        'customers' => Customer::get(),
        'pakets' => Paket::get(),
        'outlets' => Outlet::get(),
        'title' => 'Create Transaksi'
       ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $request->merge(['slug'=>$request->nama]);
            if($request->has('customer_id')){
                $customer_id = $request->customer_id;
            }else{
                $customer = $this->customer->create($request->all());
                $customer_id = $customer->id;
            }

            $request->merge(['slug'=>$request->nama_outlet]);
            if($request->has('outlet_id')){
                $outlet_id = $request->customer_id;
            }else{
                $outlet = $this->outlet->create($request->all());
                $outlet_id = $outlet->id;
            }

            $data_transaksi = [
                'no_invoince'=> $this->generateInvoice(date('Y-m-d')),
                'customer_id'=> $customer_id,
                'outlet_id' => $outlet_id,
                'tgl'=> date('Y-m-d H:i:s'),
                'status'=> 'proses',
            ];

            $transaksi = $this->transaksi->create($data_transaksi);

            for ($q=0; $q <count($request->paket_id) ; $q++) {
                $price = $this->paket->find($request->input('paket_id.'.$q))->price;
                $this->detail_transaksi = Transaksi::create([
                    'transaksi_id'=> $transaksi->id,
                    'paket_id'=> $request->input('paket_id.'.$q),
                    'qty'=> $request->input('qty.'.$q),
                    'price'=> $price,
                    'total_bayar' => $price * $request->input('qty.'.$q),
                ]);
            }

            $jumlah_bayar = $this->detail_transaksi->where('transaksi_id',$transaksi->id)->get()->sum('total_bayar');
            $this->transaksi->find($transaksi->id)->update(['jumlah_bayar'=>$jumlah_bayar]);
            DB::commit();
            return redirect('transaksi')->with('success','Data telah disimpan');
            // return redirect()->route('transaction.print',$transaksi->id);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message','Hayohwe error wae njing teh lah FUCCEK');
        }
    }

    public function print(Transaksi $transaksi)
    {
        $data = $this->transaksi->find($transaksi);
        $pdf = PDF::loadView('admin.transaksis.print', compact('data'));
        return $pdf->stream();
    }

    private function generateInvoice($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = substr($tgl,5,2);
        $tahun = substr($tgl,2,2);
        $transaksi = $this->transaksi->whereDate('tgl',$tgl)->get();
        $no = 'TRX-'.$tanggal.$bulan.$tahun.'-'.sprintf('%05s',$transaksi->count()+1);
        return $no;
    }

}
