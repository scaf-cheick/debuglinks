@if(Auth::check())
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large back-green join-us pulse tooltipped modal-trigger" href="#addThread" data-position="left" data-tooltip="Publish solution">
          <i class="large material-icons white-text">create</i>
        </a>
    </div>
@else

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large back-green join-us pulse" href="{{route('login')}}">
          <i class="large material-icons white-text">person_add</i>
        </a>
    </div>

@endif