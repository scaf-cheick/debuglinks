<!-- Modal Login Structure -->
<div id="modal-login" class="modal">
  <div class="modal-content">
      <h4>Login !</h4>
      
      <div class="row">
        <form class="col s12" action="{{route('login')}}" method="POST">
          @csrf
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" required="" value="{{ old('email') }}" class="validate">
              <label for="email">Email</label>
              @error('email')
                    <span class="helper-text red-text">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-field col s12">
              <input id="password" type="password" required="" class="validate">
              <label for="password">Password</label>
               @error('password')
                  <span class="helper-text red-text">{{ $message }}</span>
              @enderror
            </div>
            <p>
              <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                <span>Remember me?</span>
              </label>
            </p>
            <div class="col s12 right">
                <button class="btn btn-medium waves-light waves-light back-color right">Login<i class="material-icons right">done_all</i></button>
            </div>
          </div>
        </form>
      </div>

  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
</div>