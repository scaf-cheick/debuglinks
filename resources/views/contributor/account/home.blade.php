@extends('layouts.front')

@section('content')

    <div class="marge">
        <br>
        <div class="center">
            <img src="{{asset('uploads/contributors/'.$account->picture)}}" class="circle shadow1" width="250" height="250">
            <p>
                <a href="#edit_profil" id="" class="btn btn-small back-color z-depth-0 modal-trigger hg"> Edit my profil ? <i class="material-icons right">person</i></a>

            </p>
            <h1 class="title_member">@ {{$account->name}}</h1>
            <p><a href="mailto:{{$account->email}}">{{$account->email}}</a></p>
            <div class="member_box">
                <p class="big-subtitle"> @if($account->description == null) Enter here a catchphrase here that best defines you @else {{$account->description}} @endif
                </p>
                <a href="" class="btn btn-small tooltipped back-color z-depth-0" data-position="bottom" data-tooltip="Rating"> {{$account->rating}} <i class="material-icons right">star</i></a>
                <a href="" class="btn btn-small tooltipped back-color z-depth-0" data-position="top" data-tooltip="Contributions"> {{count($account->threads)}} <i class="material-icons right">mode_edit</i></a>
                <a href="" class="btn btn-small tooltipped back-color z-depth-0" data-position="bottom" data-tooltip="Comments"> {{count($account->comments)}} <i class="material-icons right">message</i></a>
            </div>

              </div>
              <br>

            <div>
                <div class="">

                    <table class="highlight">
                      <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Views</th>
                            <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody>
                        @forelse($threads as $thread)
                          <tr>
                            <td>{{$thread->subject}}</td>
                            <td>{{$thread->category->title}}</td>
                            <td>{{$thread->views}}</td>
                            <td>

                               <a class= "btn waves-effect btn-small back-color" href="{{route('threads.show', $thread)}}">
                                  <i class="material-icons white-text">remove_red_eye</i>
                              </a>

                              &nbsp&nbsp

                              <a class= "btn waves-effect btn-small green modal-trigger" href="#updateThread{{$thread->ref}}">
                                  <i class="material-icons white-text">edit</i>
                              </a>

                              @include('layouts.partials._modal-thread-edit')

                            </td>
                          </tr>
                        @empty
                        <p class="center">No solution published for the moment!</p>
                        @endforelse
                      </tbody>
                    </table>

                    <br>
                    <div class="center">
                        {{$threads->links()}}
                    </div>
                    <br>  

                </div>
            </div>


            @include('layouts.partials._modal-profil-update')

            @push('js')
                    @include('layouts.partials._notification')
            @endpush
            {{-- @push('js')
                    <script type="text/javascript">

                      @if ($errors->has('field_name') > 0)
                          $(document).ready(function(){
                              $('#edit_profil').modal('open');
                          });
                      @endif

                      @if ($errors->has('thread') && > 0)
                          $(document).ready(function(){
                              $('#edit_profil').modal('open');
                          });
                      @endif

                    </script>
            @endpush --}}
            
              
          <br><br>  
          </div>

@endsection
