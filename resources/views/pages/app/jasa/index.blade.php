@extends('layout.app', ['title' => 'Jasa'])
@section('content')
    <!-- Page Heading -->
    
    <h1 class="h3 mb-4 text-gray-800">Jasa</h1>
     <div class="row">
          <div class="col-12">
             @include('partials.alert_msg')
            <div class="card mt-3">
              <div class="card-header">
                <a href="{{ route('jasa.create') }}" class="btn btn-primary"><i class="ion ion-plus"></i>Tambah Jasa</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($jasas as $key => $jasa)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $jasa->name }}</td>
                          <td>{{ $jasa->price }}</td>
                       
                           <td>
                            @foreach ($jasa->galleries as $gallery)
                                <img src="{{ url($gallery->image) }}" class="rounded"style="width: 50px; height:50px;">
                            @endforeach
                           </td>
                  <td class="d-flex">
                  <a href="{{ route('jasa.edit', $jasa->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit">edit</i></a>
                  <form action="{{ route('jasa.destroy', $jasa->id) }}" method="POST">
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