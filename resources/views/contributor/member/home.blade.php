@extends('layouts.front')

@section('content')


    <div class="marge">
        <br>

        <blockquote>
                <h5><b>DebugLinks contributors. We proud of you!</b></h5>
        </blockquote>

        <br>

        <form class="row" action="{{route('member.filter')}}" method="POST">
          @csrf
            <div class="input-field col s12 m6 l6">
                <select class="" name="criteria" required="">
                  <option value="last" {{ ( $key == '2') ? 'selected' : '' }} >Last registered</option>
                  <option value="best" {{ ( $key == '1') ? 'selected' : '' }}>Best contributors</option>
                </select>
                <label>Filter</label>
            </div>
            <div class="col s12 m4 l4 input-field">
                  <button class="btn btn-medium waves-light waves-light back-color" type="submit">Filter<i class="material-icons right">search</i></button>
            </div>
        </form>

        <div class="row">

            <div class="col s12 m9 l9">

                <div class="card mt-2">
                    <ul class="collection">

                        @foreach($members as $member)

                          <a class="collection-item avatar" href="{{route('member.show', $member->ref)}}">
                              <img src="{{asset('uploads/contributors/'.$member->picture)}}" alt="" class="circle">
                              <span class="title truncate"><b>{{$member->name}}</b></span>
                              <span class="grey-text" style="font-size: 12px;">inscrit {{$member->created_at->diffForHumans()}}</span>
                              <p class="truncate black-text">{{$member->description}}
                              </p>
                              <p href="#!" class="secondary-content hide-on-med-and-down"> {{$member->rate()}} <i class="material-icons left yellow-text">star</i></p>
                          </a>

                        @endforeach

                    </ul>

                    <br>
                    <div class="center">
                        {{$members->links()}}
                    </div>
                    <br>
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
