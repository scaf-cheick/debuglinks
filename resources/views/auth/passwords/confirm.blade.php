@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col s12 m8 l8">
            <div class="card-panel">
                <h3>{{ __('Confirm Password') }}</h3>
                    
                    <blockquote>{{ __('Please confirm your password before continuing.') }}</blockquote>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="input-field">
                                <i class="material-icons prefix blue-text">lock_outline</i>
                                <input type="password" id="password" name="password" required="">
                                <label for="password">Password <span class="red-text">*</span></label>
                                @error('password')
                                      <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="back-color btn btn-small">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
