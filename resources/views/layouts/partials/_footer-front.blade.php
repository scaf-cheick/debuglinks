<footer class="page-footer back-color">
    <div class="marge">
      <div class="row">
        <div class="col s12 m4 l4">
          <h5 class="white-text">DebugLinks</h5>
          <p class="grey-text text-lighten-4">The best way to debug your code.</p>
          <div>  
             {{-- <a href="" class="waves-effect waves-light"> <img src="{{asset('uploads/others/facebook.png')}}" width="60" height="60"> </a>
            <a href="" class="waves-effect waves-light "> <img src="{{asset('uploads/others/twiter.png')}}" width="60" height="60"> </a> --}}
            <a class="grey-text text-lighten-3" href="https://github.com/scaf-cheick/debuglinks">Contribute on GitHub</a>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <h5 class="white-text">Menu</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="{{route('login')}}">Login</a></li>
            <li><a class="grey-text text-lighten-3" href="{{route('register')}}">Register</a></li>
            
          </ul>
        </div>
        <div class="col s12 m4 l4">
          <h5 class="white-text">More Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="{{route('threads.index')}}">Solutions</a></li>
            <li><a class="grey-text text-lighten-3" href="{{route('member.home')}}">Members</a></li>
            {{-- <li><a class="grey-text text-lighten-3" href="#!">All categories</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Top posts</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Best Members</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Statistics</a></li> --}}
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | DebugLinks
      <a class="grey-text text-lighten-4 right" href="https://www.sourgou.com" target="_blank">By F'Dsign</a>
      </div>
    </div>

</footer>