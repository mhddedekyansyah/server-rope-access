@extends('layout.app', ['title' => 'Tambah Gallery Jasa'])
@section('content')
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
            <div class="card mt-3">
              <div class="card-header">
                <p>Tambah Gallery Jasa</p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                   <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nama Jasa</label>
                        <select name="jasa_id" required class="form-control @error('jasa_id')is-invalid @enderror">
                            <option selected disabled>-----pilih jasa-----</option>
                            @foreach ($jasas as $jasa)
                                <option value="{{ $jasa->id }}">{{ $jasa->name }}</option>
                            @endforeach
                        </select>
                        @error('jasa_id')
                            <small class="text-muted invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="image">Foto</label>
                            <input value="{{ old('image') }}" multiple accept="image/*" required class="form-control  @error('image') is-invalid @enderror" id="image" type="file" name="image[]">
                            @error('image')
                            <small class="text-muted"><p class="text-danger">{{ $message }}</p></small>
                            @enderror
                        </div>
            
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary col-4">Submit</button> 
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
     
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

