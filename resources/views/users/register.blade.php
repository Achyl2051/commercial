
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
              <h6 class="fw-light">Registration</h6>
              {{--  --}}
                @if (session()->has('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif 
            {{--  --}}
              <form  action="{{ route('registration')}}" method="post" class="pt-3" >
                @method('post')
                @csrf

                <div class="form-group">
                    <input type="text" value="{{ old('nom') }}"  name="nom"  class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                    @error('nom')
                      <div class="text text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                <div class="form-group">
                  <input type="email" value="{{ old('email') }}"  name="email"  class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email">
                  @error('email')
                    <div class="text text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <input type="password" value="{{ old('motdepasse') }}" name="motdepasse" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  @error('motdepasse')
                    <div class="text text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Sign in</button>
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
                  have already an account? <a href="{{ route('login') }}" class="text-primary">Log in</a>
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

