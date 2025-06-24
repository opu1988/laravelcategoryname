<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $keyword = request('search');
       $title = "All Posts";
        $posts= Post::where('title', 'like', '%'.$keyword.'%')
        ->orwhere('content', 'like', '%' .$keyword. '%')
        ->orderBy('id', 'desc')->paginate(5);


        return view('admin.posts',[
    
            'posts' => $posts,
            'keyword' => $keyword,
            'title' => $title

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();

        return view('admin.create-post', [


            'categories' => $categories,
            'title' => 'Create New Post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpg, png'
            
        ]);


        

        

        $post = new Post;

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->slug = implode( '-', explode (' ', $request->title ) ) . '-' . time();
        $post->content = $request->content;

        $image_name = $request->file('thumbnail')->hashName();
        $request->file('thumbnail')->storeAs('public/images',  $image_name);

        $post->thumbnail = $image_name;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->views = 0;

        $post->save();



        return redirect()->route('admin-posts')->with('message', 'Post has been Published');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        $categories = Category::all();

        return view('admin.edit-post', [


            'post' => $post,
            'categories' => $categories,
            'catt'  => $post->category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all() );

        return back()->with('message', 'Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('message', 'Post has been Deleted');
    }
}



