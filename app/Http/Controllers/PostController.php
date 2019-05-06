<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{/** 
//     34an a7mi m7d4 yd5ool ela ely 3aml login
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $user = new User;
       // echo $user->id;
        $id=Auth::id();
        $posts = Post::all();
       // return view('posts.index')->with('posts',Post::all());
    
        return response()->json(compact('id'));
    }

    //  public function show(Request $request, $id)
    // {
    //     $value = $request->session()->get('key');

        
    // }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        echo $user->id;
         return view('posts.create')->with('categories',Category::all());
;
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
        //show the request of user
       // dd($request->all());
    
        $this->validate($request,[
            "title" => "required",
            "content" => "required",
            "category_id" => "required",
            //"slug" => "required",
            "featrued" => "required|image"


        ]);

//le ta8er el path bata3 el sora
$featrued = $request->featrued;
$featrued_new_name = time().$featrued->getClientOriginalName();
$featrued->move('uploads/posts',$featrued_new_name);

        $post = Post::create([
            "title" => $request->title,
            "content" => $request->content,
            "category_id" => $request->category_id,
            "featrued" => 'uploads/posts'.$featrued_new_name,
            "slug" => str_slug($request->title)

        ]);
        return redirect()->back();
    // dd($request->all());   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
00     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
         $post = Post::find($id);
        $this->validate($request,[
            "title"    => "required",
            "content"  => "required",
            "category_id"  => "required" 
            
        ]);
        if ( $request->hasFile('featured')  ) {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_new_name);
            $post->featrued = 'uploads/posts/'.$featured_new_name;
        }
        $post->title =  $request->title;
        $post->content =  $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        
        return redirect()->route('posts');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
         return redirect()->back();
    }
    public function trashed()
    {
        $post = Post::onlyTrashed()->get();//get value
        dd($post->all());
        
         //return redirect()->route('categories');
    }
    public function hdelete()
    {
        $post = Post::withTashed()->where('id',$id)->first();
        $post->forceDelete();
         //return redirect()->route('categories');
    }
}
