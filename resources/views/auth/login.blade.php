@extends('layouts.front')

@section('content')

    <div class="marge">
        <div class="row">
            <div class="col s12 m12 l6 offset-l3">
                <br><br>
                <div class="card">
                    <div class="card-action white-text center back-color">
                        <img src="{{asset('uploads/contributors/user_avatar.png')}}" alt="" class="circle">
                    </div>
                    <div class="card-content">
                        <blockquote>
                            <span style="font-size: 11px">Login!</span>
                        </blockquote>
                        <form action="{{route('login')}}" method="POST">
                            @csrf

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

                            <p>
                              <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                <span>Se souvenir de moi?</span>
                              </label>
                            </p><br>
                            
                            <br>        

                            <button class="waves-effect waves-dark btn-large back-color btn_register" type="submit">Login</button>

                            @if (Route::has('password.request'))

                                <div class="input-field">
                                    <br>
                                    <p class="margin medium-small"><a href="{{ route('password.request') }}">Password forgot?</a></p>
                                </div>

                            @endif
                            <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                                  <strong>Login With Google</strong>
                            </a> 
                        </form>
                                    
                      </div>
               </div>
               <br><br>    
            </div>

        </div>
    </div>


@endsection

