<?php

namespace App\Http\Controllers\Thread;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Thread;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Notifications\NewCommentNotification;
use Illuminate\Support\Facades\Validator;

class ThreadController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified'], ['except' => ['index', 'show','filterByCategory','filterByTag', 'searchByKeword']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::orderBy('id','desc')->paginate(50);
        $categories = Category::all();
        $tags = Tag::all();

        return view('thread.index', compact('threads', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'subject' => ['required', 'string','min:10'],
            'link' => ['required', 'url'],
            'category' => ['required'],
            'tags' => ['required'],
            'tags.*' => ['exists:tags,id'],
        ]);

        if ($validator->fails()) {
            $validator->errors()->add('addThread', 'modal add thread');
            return back()->withErrors($validator);
        }

        /*
        $data = $this->validate($request, [
            'subject' => ['required', 'string','min:10'],
            'link' => ['required', 'url'],
            'category' => ['required'],
            'tags' => ['required'],
            'tags.*' => ['exists:tags,id'],
        ]);
        */

        $slug = Str::slug($request->subject);

        $thread = Thread::create([
            'subject' => $request->subject,
            'link' => $request->link,
            'category_id' => $request->category,
            'user_id' => $user->id,
            'slug' => $slug,
            'ref' => uniqid(),
        ]);

        $thread->tag()->sync((array)$request->tags);

        $request->session()->flash('status', 'Solution publiée avec succès...');

        return redirect()->route('threads.show', $thread);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        $thread->views += 1;
        $thread->save();

        //$threads = Thread::where('category_id', $thread->category_id)->where('id','!=', $thread->id)->orderBy('id','desc')->paginate(3);

        $threads = Thread::join('thread_tag', 'threads.id','=','thread_tag.thread_id')
            ->join('tags','tags.id','=','thread_tag.tag_id')
            // ->orWhereIn('tags.id',collect($thread->tag))
            //->where('id','!=', $thread->id)
            ->with('tag')
            ->distinct()
            // ->where('category_id', $thread->category_id)
            ->orderBy('id','desc')
            ->select('threads.*')
            ->paginate(15);

            // ->with('tag')
            // ->distinct()
            // ->get(['threads.*'])


        $categories = Category::all();

        return view('thread.show', compact('thread','threads','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $thread = Thread::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'subject' => ['required', 'string','min:10'],
            'link' => ['required', 'url'],
            'category' => ['required'],
            'tags' => ['required'],
            'tags.*' => ['exists:tags,id'],
        ]);

        if ($validator->fails()) {
            $validator->errors()->add('editThread', $thread->ref);
            return back()->withErrors($validator);
        }

        /*
        $data = $this->validate($request, [
            'subject' => ['required', 'string','min:10'],
            'link' => ['required', 'url'],
            'category' => ['required'],
            'tags' => ['required'],
            'tags.*' => ['exists:tags,id'],
        ]);
        */

        $slug = Str::slug($request->subject);

        $thread->subject = $request->subject;
        $thread->link = $request->link;
        $thread->category_id = $request->category;
        $thread->slug = $slug;
        $thread->save();

        $thread->tag()->sync((array)$request->tags);

        $request->session()->flash('status', 'Solution modifiée avec succès...');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function filterByCategory($title, $id)
    {
        $category = Category::findOrFail($id);
        $threads = Thread::where('category_id', $category->id)->orderBy('id','desc')->paginate(20);
        $categories = Category::all();
        $tags = Tag::all();

        return view('thread.index', compact('threads', 'categories', 'tags'));

    }

    public function filterByTag(Request $request){

        $data = $this->validate($request, [
            'tags' => ['required'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $threads = Thread::join('thread_tag', 'threads.id','=','thread_tag.thread_id')
            ->join('tags','tags.id','=','thread_tag.tag_id')
            ->orWhereIn('tags.id',collect((array)$request->tags))
            ->with('tag')
            ->distinct()
            ->get(['threads.*']);

        $categories = Category::all();
        $tags = Tag::all();

        return view('thread.search', compact('threads', 'categories', 'tags'));
    }


    public function searchByKeword()
    {

       if (isset($_GET['search'])) {
            $s = $_GET['search'];
            //dd($s);


            $q = "%".str_replace(" ", "%", $s)."%";

            $threads = Thread::where([
                        ["subject", "like", "%" . $q . "%"]
                    ])->orderBy('id', 'desc')->paginate(25);

            //$threads = Thread::where('subject','regexp', $s)->get();
            //dd($threads);

            /*
                $result = collect([]);
                $queries = explode(" ", $s);

                foreach ($queries as $k) {

                    $threads = Thread::where([
                        ["subject", "like", "%" . $k . "%"]
                    ])->orderBy('id', 'desc')->get();

                    $result->push($threads);
                }

                $threads = Thread::WhereIn('id', $results) $result;
            */

            //dd($threads);

            $categories = Category::all();
            $tags = Tag::all();

            return view('thread.index', compact('threads', 'categories', 'tags'));
        }

    }

    public function customDelete($id)
    {
        $thread = Thread::findOrFail($id);
        if(Auth::user()->id == $thread->user_id || Auth::user()->role == 'admin'){
            $thread->delete();
            return redirect()->back()->with('status', 'Suppression éffectuée avec succès...');
        }
    }

    public function replyComment(Request $request, $id){

        $this->validate($request,[
            'body' => 'required|min:2',
        ]);

        $reply = new Comment();
        $reply->body = $request->body;
        $reply->user_id = Auth::user()->id;
        $comment = Comment::findOrFail($id);

        $comment->comments()->save($reply);

        $author = $comment->author;
        $author->notify(new NewCommentNotification(Thread::findOrFail($request->thread_id), true));

        $request->session()->flash('status', 'Commentaire publié avec succès...');

        return redirect()->back();

    }


    public function commentThread(Request $request, $id){

        $this->validate($request,[
            'body' => 'required|min:2',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;

        $thread = Thread::findOrFail($id);

        $thread->comments()->save($comment);

        $author = $thread->author;
        $author->notify(new NewCommentNotification(Thread::findOrFail($id), false));

        $request->session()->flash('status', 'Commentaire publié avec succès...');

        return redirect()->back();

    }
}
