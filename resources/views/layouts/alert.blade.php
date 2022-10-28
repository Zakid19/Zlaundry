@if (session('success'))
    <div class="badge badge-sm text-white alert bg-gradient-success">{{ session('success') }}</div>
@endif

@if (session('error-message'))
    <div class="badge badge-sm text-white alert bg-gradient-danger">{{ session('error-message') }}</div>
@endif
