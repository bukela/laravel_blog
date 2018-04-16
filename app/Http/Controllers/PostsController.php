<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        if($category->count()==0) {
            Session::flash('info', 'You must have category to make post');
            return redirect()->back();
        }
        return view('admin.posts.create', compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required',
        ]);
        $featured = $request->featured;
        $featured_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_name);
        
        //nacin sa Post::create
        // $post = Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'featured' => 'uploads/posts/'.$featured_name,
        //     'category_id' => $request->category_id
        // ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->featured = 'uploads/posts/'.$featured_name;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
        $post->save();
        Session::flash('success', 'Post created successfully !');
        return redirect(route('posts'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $post = Post::find($id);
        $category = Category::all();
        return view('admin.posts.edit', compact('post', 'category'));
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')) { //provera da li je user menjao sliku
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();
        Session::flash('success', 'Post updated successfully');
        return redirect(route('posts'));
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
        Session::flash('success', 'Post deleted');
        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed', compact('posts')); 
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete(); //brise iz baze
        Session::flash('success', 'Post permanently deleted');
        return redirect()->back();
    }

    public function restore($id) {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post restored successfully');
        return redirect(route('posts'));
    }
}
