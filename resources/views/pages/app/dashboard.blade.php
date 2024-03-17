@extends('layout.app', ['title' => 'Dashboard'])
@section('content')
    <!-- Page Heading -->
    
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Total User
                    <div class="text-white-50 small">{{ $countUsers }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <a class="card bg-info text-white text-decoration-none shadow" href="{{ route('produk.index') }}">
                <div class="card-body">
                    Total Produk
                <div class="text-white-50 small">{{ $countProducts }}</div>
                </div>
            </a>
        </div>
        
         <div class="col-md-3">
            <a class="card bg-info text-white shadow text-decoration-none" href="">
                <div class="card-body">
                    Total Jasa
                <div class="text-white-50 small">{{ $countJasas }}</div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="card bg-info text-white shadow text-decoration-none" href="">
                <div class="card-body">
                    Total Transaksi
                <div class="text-white-50 small">{{ $countTransactions }}</div>
                </div>
            </a>
        </div>
       
    </div>
    
@endsection