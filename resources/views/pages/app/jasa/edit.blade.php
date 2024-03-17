@extends('layout.app', ['title' => 'Edit Jasa'])
@section('content')
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
            <div class="card mt-3">
              <div class="card-header">
                <p>Edit Jasa</p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('jasa.update', $jasa->id) }}" method="POST">
                @method('put')
                  @csrf
                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Nama Jasa</label>
                            <input type="text" required value="{{$jasa->name ?? old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                            <small class="text-muted"><p class="text-danger">{{ $message }}</p></small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Harga Jasa</label>
                            <input value="{{$jasa->price ?? old('price') }}" required class="form-control  @error('price') is-invalid @enderror" id="price" type="number" name="price">
                            @error('price')
                            <small class="text-muted"><p class="text-danger">{{ $message }}</p></small>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="handphone">No.Hp</label>
                            <input value="{{$jasa->handphone ?? old('handphone') }}" required class="form-control  @error('handphone') is-invalid @enderror" id="handphone" type="number" name="handphone">
                            @error('handphone')
                            <small class="text-muted"><p class="text-danger">{{ $message }}</p></small>
                            @enderror
                        </div> --}}
            
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

