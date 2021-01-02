@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname"
                                 value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname"
                                 value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">

<label for="mobile" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
   <div class="col-sm-6">
   <input type="number"  name="mobile" class="form-control" id="mobile">
               </div>  </div>
                        <div class="form-group row">

                     <label for="lname" class="col-sm-3 text-right control-label col-form-label">Country</label>
                        <div class="col-sm-6">
                        <input type="text"  name="country_id" class="form-control" id="country_id">
                                    </div>  </div>

                        <div class="form-group row">
                 <label for="lname" class="col-sm-3 text-right control-label col-form-label">State</label>
                 <div class="col-sm-6">
                    <input type="text"  name="state_id" class="form-control" id="state_id">
                                    </div>  </div>
                                   
                                   
                                    <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">City</label>
                                    <div class="col-sm-6">
                                 <input type="text"  name="city_id" class="form-control" id="city_id">
                                    </div>  </div>
                                    <div class="form-group row">

<label for="lname" class="col-sm-3 text-right control-label col-form-label">Company</label>
   <div class="col-sm-6">
   <input type="text"  name="company_id" class="form-control" id="company_id">
               </div>  </div>
                                    <div class="form-group row"> 
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">address</label>
                                    <div class="col-sm-6">
                            <input type="text"  name="address" class="form-control" id="address">
                                    </div> </div>
                                    <div class="form-group row"> 
                                    <label for="gender" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                    <div class="col-sm-6">
                                    <select type="text" name="gender" class="form-control" id="gender" placeholder="Gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div> </div>
                                    <div class="form-group row"> 
                                    <label for="role_id" class="col-sm-3 text-right control-label col-form-label">Role </label>
                                    <div class="col-sm-6">
                                    <select type="text" name="role_id" class="form-control" id="role_id" placeholder="Gender">
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                    </div> </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
