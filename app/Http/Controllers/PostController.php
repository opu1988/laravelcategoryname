<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_posts= DB::table('posts')->get();

        return view('pages.blog',[
    
            'posts' => $all_posts

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "opu 2";
        $thumbnail = "http://127.0.0.1:8000/assets/images/blog-image-1.jpg";
        $excerpt = "lorem ipsum dollar";

        $insert_post = DB::insert("INSERT INTO posts (title, thumbnail, excerpt) VALUES (?, ?, ?)", [$title, $thumbnail, $excerpt]);

        if($insert_post){

            return "post has been added";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $update_post = DB::table('posts')
        ->where('id', '=', 11)
        ->update(['thumbnail' => 'https://images.pexels.com/photos/15286/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'title' => 'opu3']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post_id = 10;
        DB::table("posts")
        ->where('id', $post_id)
        ->delete();
    }
}



