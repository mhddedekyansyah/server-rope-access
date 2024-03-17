@if (session()->has('success'))
      <div class="row justify-content-center mt-3">
          <div class="col">
              <div class="alert alert-success" role="alert">
              {{ session()->get('success') }}
            </div>
          </div>
      </div>
@endif
@if (session()->has('error'))
   <div class="row justify-content-center mt-3">
          <div class="col">
              <div class="alert alert-danger" role="alert">
              {{ session()->get('error') }}
            </div>
          </div>
      </div>
@endif