@extends('layouts.front')

@section('content')
<div class="marge">
    <div class="row">
        <div class="col s12 m12 l6 offset-l3">
            <br><br>
            <div class="card">

                <div class="card-content">
                     <blockquote>
                        <span class="f12">{{ __('Reset Password') }}</span>
                    </blockquote>

                    @if(session('status'))
                        <div class="">
                            <div class="row" id="alert_box">
                              <div class="col s12">
                                <div class="card green darken-2">
                                  <div class="row">
                                    <div class="col s10">
                                      <div class="card-content white-text">
                                        <p>{{ session('status') }}</p>
                                      </div>
                                    </div>
                                    <div class="col s2">
                                      <i class="material-icons icon_style" id="alert_close">close</i>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="col s12 input-field">
                            <i class="material-icons prefix blue-text">email</i>
                            <input type="email" id="email" name="email" required="" value="{{ old('email') }}" class="validate">
                            <label for="email" class="center-align">Email<span class="red-text">*</span></label>
                            @error('email')
                                  <span class="helper-text red-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col s12">
                            <button type="submit" class="btn back-color">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                    <br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

    @include('layouts.partials._notification')

@endpush



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
