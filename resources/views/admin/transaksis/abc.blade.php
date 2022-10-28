

        request()->validate( [
            'customer_id' => 'required',
            'outlet_id' => 'required',
            'paket' => 'required',
            'qty' => 'required',

        ]);

        $transaksi = Transaksi::create([
            'transaksi_id'=> request('transaksi->id,'),
            'paket_id'=> request('paket'),
            'qty'=> request('qty'),
            'price'=> request('price'),
            'total_bayar' => request()->price * request()->qty
        ]);
