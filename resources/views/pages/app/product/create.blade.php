@extends('layout.app', ['title' => 'Tambah Produk'])
@section('content')
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
            <div class="card mt-3">
              <div class="card-header">
                <p>Tambah Produk</p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" value="{{ old('name') }}" required class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                            <small class="text-muted"><p class="text-danger">{{ $message }}</p></small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Harga Produk</label>
                            <input value="{{ old('price') }}" required class="form-control  @error('price') is-invalid @enderror" id="price" type="number" name="price">
                            @error('price')
                            <small class="text-muted"><p class="text-danger">{{ $message }}</p></small>
                            @enderror
                        </div>
                
                        <div class="form-group">
                        <label for="stok">Stok Porduk</label>
                        <input type="number" required value="{{ old('stok') }}" class="form-control  @error('stok') is-invalid @enderror" id="stok" name="stok">
                        @error('stok')
                        <small class="text-muted"><p class="text-danger">{{ $message }}</p></small>
                        @enderror
                        </div>
                    </div>
                     <div class="col-4">
                         <div class="form-group">
                            <label for="image">Image Porduk</label>
                            <input type="file" required value="{{ old('image') }}" accept="image" class="form-control  @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                            <small class="text-muted"><p class="text-danger">{{ $message }}</p></small>
                            @enderror
                        </div>
                        <img src="" alt="Image Preview" class="rounded d-none" style="width: 100%; height:180px;" id="image-preview">
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

@push('scripts')
<script>
  $(document).ready(function (e) {
 
   
   $('#image').change(function(){
     let reader = new FileReader();
     
     reader.onload = (e) => { 
       
      $('#image-preview').removeClass('d-none')
      $('#image-preview').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
</script>

@endpush