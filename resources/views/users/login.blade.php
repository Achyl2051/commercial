@extends('./layouts/login&register')

@section('page-content')

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('images/logo.svg') }} " alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              {{--  --}}
                @if (session()->has('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif 
            {{--  --}}
              <form  action="{{ route('login')}}" method="post" class="pt-3" >
                @method('post')
                @csrf

                <div class="form-group">
                  <input type="email" value="{{ old('email') }}"  name="email"  class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                  @error('email')
                    <div class="text text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <input type="password" value="{{ old('password') }}" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  @error('password')
                    <div class="text text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Log in</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>

                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="{{ route('registration') }}" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- container-scroller -->

  @endsection

