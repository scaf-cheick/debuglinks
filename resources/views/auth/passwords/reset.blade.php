@extends('layouts.front')

@section('content')
    <div class="marge">
        <div class="row">
            <div class="col s12 m12 l6 offset-l3">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}

                    <div class="card-panel">
                        <blockquote>
                            {{ __('Reset Password') }}
                        </blockquote>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="input-field">
                                <i class="material-icons prefix blue-text">email</i>
                                <input type="email" id="email" name="email" required="" value="{{ old('email') }}" class="validate">
                                <label for="email" class="center-align">Email<span class="red-text">*</span></label>
                                @error('email')
                                      <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix blue-text">lock_outline</i>
                                <input type="password" id="password" name="password" required="">
                                <label for="password">Password <span class="red-text">*</span></label>
                                @error('password')
                                      <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix blue-text">lock</i>
                                <input type="password" id="password-confirmation" name="password_confirmation" required="">
                                <label for="password-confirmation">Confirm password <span class="red-text">*</span></label>
                            </div>

                            <div class="">
                                <div class="">
                                    <button type="submit" class="btn back-color">
                                        {{ __('Reset Password') }}
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


{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

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
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
