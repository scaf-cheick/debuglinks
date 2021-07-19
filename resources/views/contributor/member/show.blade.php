@extends('layouts.front')

@section('content')
		
	
	<div class="marge">
        <br>
        <div class="center">
            <img src="{{asset('uploads/contributors/'.$member->picture)}}" class="circle shadow1" width="250" height="250">
            <h1 class="title_member">@ {{$member->name}}</h1>
            <p><a href="mailto:{{$member->email}}">{{$member->email}}</a></p>
            <div class="member_box">
                <p class="big-subtitle"> @if($member->description == null) No catchphrase defined yet @else {{$member->description}} @endif
                </p>
                <a href="" class="btn btn-small tooltipped back-color z-depth-0" data-position="bottom" data-tooltip="Rating"> {{$member->rating}} <i class="material-icons right">star</i></a>
                <a href="" class="btn btn-small tooltipped back-color z-depth-0" data-position="top" data-tooltip="Contributions"> {{count($member->threads)}} <i class="material-icons right">mode_edit</i></a>
                <a href="" class="btn btn-small tooltipped back-color z-depth-0" data-position="bottom" data-tooltip="Comments"> {{count($member->comments)}} <i class="material-icons right">message</i></a>
            </div>

              </div>
              <br>

            <div>

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
                          <li class="collection-item"><span>No solution published for the moment!</span></li>
                        @endforelse
                      
                  	</ul>

                
                  	<br>
                  	<div class="center">
                      	{{$threads->links()}}
                  	</div>
                  	<br>         
              	</div>
                
            </div>
            
              
          <br><br>  
        </div>


@endsection
