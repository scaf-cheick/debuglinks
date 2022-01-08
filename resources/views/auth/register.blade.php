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
                            <span style="font-size: 11px">An email will be sent to you after your registration on the email address that you provide in order to finalize your registration</span>
                        </blockquote>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="input-field">
                                <i class="material-icons prefix blue-text">person</i>
                                <input type="text" id="name" name="name" required="" value="{{ old('name') }}" class="validate">
                                <label for="name" class="center-align">Full name<span class="red-text">*</span></label>
                                @error('name')
                                      <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>

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
                            
                            <br>        

                            <button class="waves-effect waves-dark btn-large back-color btn_register" type="submit">Register</button>

                            <div class="input-field">
                                <br>
                                <p class="margin medium-small"><a href="">Already registered?</a></p>
                            </div>

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

