@extends('layout.app', ['title' => 'Dashboard'])
@section('content')
    <!-- Page Heading -->
    
    <h1 class="h3 mb-4 text-gray-800">Detail Transaksi</h1>
    <div class="row">
          <div class="col-12">
             @include('partials.alert_msg')
            <div class="card mt-3">
             
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5>Nama User</h5>
                        <p>{{ $transaction->user->name }}</p>
                        <h5>Alamat User</h5>
                        <p>{{ $transaction->address }}</p>
                        <h5>Total Harga</h5>
                        <p>{{ number_format($transaction->total_price) }}</p>
                    </div>
                    <div class="col-6">
                        <h5>Produk Item</h5>
                        @foreach ($transaction->items as $item)
                        <div>{{ $item->product->name }} </div>
                        <small>jumlah {{ $item->quantity }}</small>
                        @endforeach
                        
                        <h5 class="mt-3">Status</h5>
                        <div>{{ $transaction->status }}</div>
                        <form action="{{ route('transaction.change-status', $transaction->id) }}" method="post">
                            @csrf
                            <div class="form-group mt-4">
                        <label>Ubah Status</label>
                        <select name="status" required class="form-control @error('status')is-invalid @enderror">
                            <option selected disabled value="{{ $transaction->status }}">{{ $transaction->status }}</option>
                                <option value="SUCCESS">SUCCESS</option>
                                <option value="PENDING">PENDING</option>
                                <option value="CANCEL">CANCEL</option>
                        </select>
                        @error('status')
                            <small class="text-muted invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary col-4">ubah</button> 
                        </form>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
    </div>

    
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
        $('#table').DataTable();
      });
  $(document).ready(function() {
      window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);
    }); 
</script>

@endpush