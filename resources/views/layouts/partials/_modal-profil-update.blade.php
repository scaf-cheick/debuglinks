<!-- Modal Edit profil Structure -->
<div id="edit_profil" class="modal">
    <div class="modal-content">
        <div class="row">
          <form class="col s12" method="POST" action="{{route('account.update')}}"  enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="file-field input-field col s12">
                  <div class="btn back">
                     <span>Picture</span>
                     <input type="file" name="picture" id="picture">
                  </div>

                  <div class="file-path-wrapper">
                      <input class="file-path validate" name="picture" id="picture" type="text"  placeholder="profil picture">
                      @error('picture')
                            <span class="helper-text red-text">{{ $message }}</span>
                      @enderror
                  </div>
              </div>
              <div class="input-field col s12">
                <input id="name" name="name" type="text" class="validate" value="{{$account->name}}">
                <label for="name">Full name<span class="red-text">*</span></label>
                @error('name')
                      <span class="helper-text red-text">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-field col s12">
                <input id="description" name="description" type="text" class="validate" value="{{$account->description}}" placeholder="Enter a catchphrase here that best defines you.">
                <label for="name">Catch text</label>
                @error('description')
                      <span class="helper-text red-text">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-field col s12">
                <input id="email" type="email" name="email" class="validate" value="{{$account->email}}">
                <label for="email">Email<span class="red-text">*</span></label>
                @error('email')
                      <span class="helper-text red-text">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
                @error('password')
                      <span class="helper-text red-text">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-field col s12">
                <input id="password_confirm" name="password_confirm" type="password" class="validate">
                <label for="password_confirm">Confirm Password</label>
              </div>
              <div class="col s12">
                  <button class="btn btn-medium waves-light waves-light back-color">Edit<i class="material-icons right">done_all</i></button>
              </div>
            </div>
          </form>
        </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

@push('js')
        <script type="text/javascript">

          @if ($errors->has('profilUpdate'))
              $(document).ready(function(){
                  $('#edit_profil').modal('open');
              });
          @endif

        </script>
@endpush