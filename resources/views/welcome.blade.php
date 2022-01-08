@extends('layouts.front')

@section('content')

    <div class="marge">
        <div class="row">

            <div class="col s12 m12 l6 " data-aos="fade-right" data-aos-delay="400">
              <h1 class="big-title">DebugLinks,<br> The best way to debug your code.</h1>
              <p class="big-subtitle">Thanks to the contributions of developers who have already solved the same issues as you.</p>   
              <br>
              <a href="{{route('register')}}" class="btn btn-small back-color waves-effect waves-light z-depth-0 ">Register now!<i class="material-icons white-text right">group</i></a>          
            </div>

            <div class="col s12 m12 l6">
              <div class="banner_img">
                <img src="{{asset('uploads/others/banner.png')}}" class="responsive-img">
              </div>      
            </div>

            <br><br>

            <div class="container">

                <div id="search-container">
                  <br><br>
                  <form action="{{route('search.keywords')}}" method="get" role="search" >
                        
                      <input placeholder="How to create your own ..."  name="search" class="search-box validate white search-circle search-shadow" type="text" required="">
                  </form>
                  
                </div>

            </div>

        </div>

    </div> 
          
    <div style="" class="how-section">
            
        <h1 class="big-title center">How it works ?</h1>
        <p class="big-subtitle center ml20r20">Our mission is to help developers drastically reduce the time spent debugging their code. And this, thanks to the experiences of other developers who have already solved this same problems.</p>
        <br>
        <div class="row">

            <div class="col s12 m4 l4" data-aos="fade-bottom" data-aos-delay="400">
                <div class="">
                    <div class="icon_wrapper ml40r40">
                          <i class="material-icons white-text medium">group</i>
                    </div>
                    <p class="big_subsub center"> ({{count($members)}}) contributeurs</p>
                </div>               
            </div>

            <div class="col s12 m4 l4" data-aos="fade-bottom" data-aos-delay="400">
                <div class="">
                    <div class="icon_wrapper ml40r40">
                          <i class="material-icons white-text medium">star</i>
                    </div>
                    <p class="big_subsub center"> ({{count($contributions)}}) contributions </p>
                </div>                 
            </div>

            <div class="col s12 m4 l4" data-aos="fade-bottom" data-aos-delay="400">
              <div class="">
                  <div class="icon_wrapper ml40r40">
                        <i class="material-icons white-text medium">local_offer</i>
                  </div>
                  <p class="big_subsub center"> ({{count($tags)}}) tags </p>
              </div>
               
            </div>

            

        </div>
            
    </div> 
    <br><br><br>

    <div class="col s12 m12 l12 marge">
        <blockquote>
              <h5><b>Latest contributions</b></h5>  
              <p class=" big-subtitle">The debuglinks community is a place to discuss anything developement related. Remember to be nice and have fun.</p>
        </blockquote>
        
        <br>

        @if(Auth::check())
          <a href="#addThread" class="modal-trigger btn btn-medium waves-light waves-light back-color btn_publish_one">Publish one<i class="material-icons right">mode_edit</i></a>
        @else
          <a href="{{route('login')}}" class="btn btn-medium waves-light waves-light back-color btn_publish_one">Login to publish!!<i class="material-icons right">mode_edit</i></a>
        @endif

        {{-- <a href="{{route('login')}}" class="btn btn-medium waves-light waves-light back-color btn_publish">Publish one</a> --}}
        <br><br>
    </div>

    <div class="marge">
          
        <div class="row">
            <div class="col s12 m3 l3">
                <div class="card mt-2">
                  <div class="card-content">
                    <span class="card-title">Filter by category</span>
                    <div class="category-list">      
                       @foreach($categories as $category)     
                              <p class="mt-4"><a href="{{route('threads.filter-category', [$category->title, $category->id])}}"><i class="material-icons vertical-text-sub teal-text left"> {{$category->icone}} </i> {{$category->title}} ({{count($category->thread)}})</a></p>
                        @endforeach
                    </div>
                  </div>
                </div>
            </div>

            <div class="col s12 m9 l9">
                <div class="card mt-2">
                    <ul class="collection">
                            
                        @forelse($threads as $thread)

                            <a class="collection-item avatar" href="{{route('threads.show', $thread)}}">
                                <img src="{{asset('uploads/contributors/'.$thread->author->picture)}}" alt="" class="circle">
                                <span class="title truncate"><b>@foreach($thread->tag as $tag) {{$tag->title}}, @endforeach </b></span>
                                <span class="grey-text" style="font-size: 12px;">Posté par {{$thread->author->name}} {{$thread->created_at->diffForHumans()}}</span>
                                <br>
                                <span class="" style="font-size: 14px;">Category : {{$thread->category->title}} </span>
                                <p class="truncate black-text"> {{$thread->subject}}
                                </p>
                                <p href="#!" class="secondary-content hide-on-med-and-down"> {{$thread->views}} <i class="material-icons left">remove_red_eye</i></p>
                            </a>

                        @empty
                            <li class="collection-item"><span>No solution found for the moment!</span></li>
                        @endforelse
                          
                    </ul>
                    <br>
                    <div class="center">
                        {{$threads->links()}}
                    </div>
                    <br>         
                </div>
            </div>
            
        </div>

    </div>


@endsection

@push('js')

    <script type="text/javascript">
    
       $(document).ready(function(){
          
          /* =============== AOS Initialize =============== */
        AOS.init({
            offset: 50,
            duration: 500,
            delay: 300,
            easing: 'ease-in-sine',
            once: true,
        });

        AOS.refresh();


         });


      </script>

@endpush