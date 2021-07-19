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
