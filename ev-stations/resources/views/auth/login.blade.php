@extends('layouts.newapp')

@section('content')

<div class="header bg-gradient-primary py-5 py-lg-6 pt-lg-6">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h2 class="text-white">Welcome!</h2>
              <p class="text-lead text-white">Use Electric Vehicle Without any Tizzzy.</p>
              <p> BeeEV with You..</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-3">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-3">
              <!-- <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('public/assets/img/icons/common/github.svg')}}"></span>
                  <span class="btn-inner--text">Facebook</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('public/assets/img/icons/common/google.svg')}}"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div> -->
            <div class="card-body px-lg-4 py-lg-4">
              <div class="text-center text-muted mb-4">
                <small>Sign in with credentials</small>
              </div>
              <form role="form"  method="POST" action="{{ route('login') }}">
              @csrf
                <div class="form-group mb-2">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email"  name="email"  type="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

                  </div>
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input  placeholder="Password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  </div>
                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-6 text-left">
              <a href="{{ route('password.request') }}" class="text-dark"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('register') }}" class="text-dark"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
@endsection
