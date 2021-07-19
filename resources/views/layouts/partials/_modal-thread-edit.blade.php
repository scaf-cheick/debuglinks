<!-- Modal publish Structure -->
  <div id="updateThread{{$thread->ref}}" class="modal">
    <div class="modal-content">
        {{-- <h4>Make contibution</h4> --}}
        
        <div class="row">
          <form class="col s12" action="{{route('threads.update', $thread->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="How to make ..." id="subject" type="text" name="subject" class="validate" value="{{ $thread->subject }}">
                <label for="subject">Title of problem</label>
                @error('subject')
                      <span class="helper-text red-text">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-field col s12">
                <input placeholder="http:://wwww.solution.com/great-solution-here" id="link" type="text" name="link" class="validate" value="{{ $thread->link }}">
                <label for="link">Url of solution</label>
                @error('link')
                      <span class="helper-text red-text">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-field col s12">
                <select required="" name="category">
                    <option value="" disabled selected>Choose main category</option>
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{$category->id}}" {{ $thread->category_id == $category->id ? 'selected' : '' }} >{{$category->title}}</option>
                    @endforeach
                </select>
                <label>Category</label>
                @error('category')
                      <span class="helper-text red-text">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-field col s12">
                 <select multiple name="tags[]" class="">
                     @foreach(App\Models\Category::all() as $category)
                         <optgroup label="{{$category->title}}">
                         @foreach($category->tags as $tag)
                            <option value="{{$tag->id}}"  {{ $thread->tag->contains($tag->id) ? 'selected':'' }}>{{$tag->title}}</option>
                        </optgroup>
                        @endforeach
                      @endforeach

                      {{-- @foreach(App\Models\Tag::all() as $tag)
                          <option value="{{$tag->id}}">{{$tag->title .' - '. $tag->category->title}}</option>
                      @endforeach --}}

                  </select>
                  <label>Choose multiple tags</label>
                  @if ($errors->has('tags.*'))
                      <span class="helper-text red-text" >{{ $errors->first('tags.*') }}</span>
                  @endif
              </div>
              <div class="col s12">
                <br>
                  <button class="btn btn-medium waves-light waves-light back-color">Update<i class="material-icons right">done_all</i></button>

                  {{-- <form id="delete-form-{{$thread->ref}}" action="{{route('threads.customdelete',$thread->id)}}" method="POST"  style="display: inline-block;">
                  @csrf
                  @method('DELETE')
                  <button class= "btn waves-effect btn-small red right" onclick="if(confirm('Are you sure you want to delete this thread?')) {event.preventDefault();
                                       document.getElementById('delete-form-{{$thread->ref}}').submit();}"><i class="material-icons white-text">delete</i></button> --}}
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

          @if ($errors->has('editThread'))
              $(document).ready(function(){
                  $('#updateThread{{$errors->first('editThread')}}').modal('open');
              });
          @endif

        </script>
@endpush