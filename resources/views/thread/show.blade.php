@extends('layouts.front')

@section('title') {{$thread->subject}} @endsection
@section('description') @foreach($thread->tag as $tag) {{$tag->title.'-'}} @endforeach {{$thread->subject}} @endsection
@section('url') {{  Request::url() }} @endsection

@section('content')
    
    <div class="marge">
        <br>
        <div class="">
            <blockquote>
                <h5><b>{{$thread->subject}}</b></h5>
                <p><b>{{$thread->category->title}} : </b> 
                    @foreach($thread->tag as $tag)
                        <a href=""><i>{{$tag->title}}</i></a>
                    @endforeach 
                </p>  
                <p class="grey-text">Posté par <a href="{{route('member.show', $thread->author->ref)}}">{{$thread->author->name}}</a> {{$thread->created_at->diffForHumans()}}
                </p>
            </blockquote> 
                      
        </div>
        <br>
        <div class="row">
            <div class="col s12 m9 l9">
                <div class="card mt-2 bdr-5 back-color pad-5">
                    <p><a href="{{$thread->link}}" target="_blank" class="white-text">Click to open solution link<i class="material-icons right white-text">touch_app</i></a></p>
                </div> 
                <br>
                <ul class="collection">
                    @forelse($thread->comments as $key => $comment)

                        <li class="collection-item avatar" href="">

                          <img src="{{asset('uploads/contributors/'.$comment->author->picture)}}" alt="" class="circle">
                          <span class="title truncate"><b>{{$comment->author->name}}</b></span>
                          <span class="grey-text" style="font-size: 12px;">{{$comment->created_at->diffForHumans()}}</span>
                          <p class="black-text">{!!$comment->body!!}
                          </p>

                          <br>

                          <a class="waves-effect waves-dark btn btn-small back-color z-depth-0 btn_reply"  onclick="toggleReply({{$comment->id}})">Reply</a>

                          <div id="reply-form-{{$comment->id}}" style="display: none;">
                        
                              <form action="{{ route('reply-comment', $comment->id) }}" class="ml_5" method="POST" style="">
                                  @csrf  

                                  <input type="hidden" name="thread_id" value="{{$thread->id}}">                              

                                  <div class="input-field">
                                      <label for="body">Body</label>
                                      <input type="text" name="body" required="" value="{{ old('body') }}" validate>
                                      @if ($errors->has('body'))
                                          <span class="helper-text red-text" >{{ $errors->first('body') }}</span>
                                      @endif
                                  </div>      

                                 <button class="waves-effect waves-dark btn btn-small back-color" type="submit" >Reply</button>
                                 <br><br>

                              </form> 

                          </div>


                          @if(!empty($comment->comments))

                              <div class="ml_5">
                                  <br><br>
                                  <ul class="collection">

                                      @foreach($comment->comments as $key => $reply)                                
                                        <li class="collection-item avatar" href="">

                                          <img src="{{asset('uploads/contributors/'.$reply->author->picture)}}" alt="" class="circle">
                                          <span class="title truncate"><b>{{$reply->author->name}}</b></span>
                                          <span class="grey-text" style="font-size: 12px;">{{$reply->created_at->diffForHumans()}}</span>
                                          <p class="black-text">{!!$reply->body!!}
                                          </p>

                                        </li>                                 

                                      @endforeach

                                  </ul>

                              </div>

                          @endif

                        </li>

                    @empty

                        <li class="collection-item"><span>Be the first person to answer in this discussion ...</span></li>
                        

                    @endforelse


                </ul>

                
                <form action="{{ route('comment-a-thread', $thread->id) }}" method="POST" >
                        @csrf
                        <blockquote>Your answer!</blockquote>

                        <div class="input-field">
                            <textarea id="body" class="materialize-textarea" required=""  name="body" class="validate h_100" id="body" placeholder="Type your discussion here...">{{ old('body') }}</textarea>
                            <label for="description">content<span class="red-text">*</span> </label>
                            @if ($errors->has('body'))
                              <span class="helper-text red-text" >{{ $errors->first('body') }}</span>
                            @endif
                        </div>      

                       <button class="waves-effect waves-dark btn btn-medium back-color" type="submit" >Reply</button>
                       <br>

                </form> 
                <br><br>
                <blockquote>
                    <h5><b>Similars contributions</b></h5>
                </blockquote>
                <div class="card mt-2">
                    <ul class="collection">

                        @foreach($threads as $thread)

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

                        @endforeach
                              
                    </ul>        
                </div>
            </div>

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
                
        </div>

    </div>

@endsection

@push('js')

    @include('layouts.partials._notification')

    <script src="https://cdn.ckeditor.com/4.11.1/basic/ckeditor.js"></script>

    <script type="text/javascript">
        
        CKEDITOR.replace( 'body' );

    </script>

    <script type="text/javascript">
        
        function toggleReply(id){

            console.log(id);

            var x = document.getElementById('reply-form-'+id);

            if (x.style.display === "none") {

                x.style.display = "block";
            } 
            else{

                x.style.display = "none";
            }
        }

    </script>

@endpush
