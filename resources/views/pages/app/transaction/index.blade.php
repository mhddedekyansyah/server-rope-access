@extends('layout.app', ['title' => 'Dashboard'])
@section('content')
    <!-- Page Heading -->
    
    <h1 class="h3 mb-4 text-gray-800">Transaksi</h1>
   <div class="row">
          <div class="col-12">
             @include('partials.alert_msg')
            <div class="card mt-3">
              {{-- <div class="card-header">
                <a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="ion ion-plus"></i>Tambah Produk</a>
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Total Item</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($transactions as $key => $transaction)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $transaction->user->name }}</td>
                          <td>{{ count($transaction->items) }}</td>
                          <td>{{ number_format($transaction->total_price) }}</td>
                          <td>{{ $transaction->status }}</td>
                        
                  <td class="d-flex">
                  <a href="{{ route('transaksi.show', $transaction->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"> view</i></a>
                  <form action="{{ route('transaksi.destroy', $transaction->id)}}" method="POST">
                      @csrf
                      @method("delete")
                     <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"> hapus</i></button>
                    </form>
                    </td> 
                </tr>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
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