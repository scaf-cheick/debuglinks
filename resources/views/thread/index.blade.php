@extends('layouts.front')

@section('content')

    <div class="marge">
        <br>
        <div class="">
            <blockquote>
                <h5><b>Latest contributions</b></h5>
                <p class=" big-subtitle">The debuglinks community is a place to discuss anything development related. Remember to be nice and have fun.</p>
            </blockquote>

        </div>
        <br>

        <div class="row">
            <div class="col s12 m6 l6">
              @if(Auth::check())
                  <a href="#addThread" class="modal-trigger btn btn-medium waves-light waves-light back-color btn_publish_one">Publish one<i class="material-icons right">mode_edit</i></a>
              @else
                  <a href="{{route('login')}}" class="btn btn-medium waves-light waves-light back-color btn_publish_one">Login to publish!!<i class="material-icons right">mode_edit</i></a>
              @endif


            </div>
            <div class="col s12 m6 l6">
                <form class="row" action="{{route('threads.filter-tags')}}" method="POST">
                  @csrf
                    <div class="input-field col s12 m8 l8">
                      <select multiple class="" name="tags[]" required="">
                        @foreach($categories as $category)
                           <optgroup label="{{$category->title}}">
                           @foreach($category->tags as $tag)
                              <option value="{{$tag->id}}"  {{ (collect(old('tags'))->contains($tag->id)) ? 'selected':'' }}>{{$tag->title}}</option>
                          </optgroup>
                          @endforeach
                        @endforeach
                      </select>
                      <label>Filter with multiple tags</label>
                    </div>
                    <div class="col s12 m4 l4 input-field">
                          <button class="btn btn-medium waves-light waves-light back-color" type="submit">Filter<i class="material-icons right">search</i></button>
                    </div>
                </form>
            </div>
        </div>

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
                                <span class="grey-text" style="font-size: 12px;">Posted by {{$thread->author->name}} {{$thread->created_at->diffForHumans()}}</span>
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
                    <div class="center">
                        {{$threads->links()}}
                    </div>
                    <br>
                </div>
            </div>

        </div>

    </div>

@endsection
