@extends('layout.app', ['title' => 'Dashboard'])
@section('content')
    <!-- Page Heading -->
    
    <h1 class="h3 mb-4 text-gray-800">Produk</h1>
     <div class="row">
          <div class="col-12">
             @include('partials.alert_msg')
            <div class="card mt-3">
              <div class="card-header">
                <a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="ion ion-plus"></i>Tambah Produk</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->price }}</td>
                          <td>{{ $product->stok }}</td>
                           <td><img src="{{ url($product->image) }}" class="rounded"style="width: 50px; height:50px;"></td>
                  <td class="d-flex">
                  <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit">edit</i></a>
                  <form action="{{ route('produk.destroy', $product->id) }}" method="POST">
                      @csrf
                      @method("delete")
                     <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash">hapus</i></button>
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