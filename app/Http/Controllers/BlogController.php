<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;



class BlogController extends Controller
{
    public function index(){

        $search = request('search');

        $posts = cache()->remember('posts', now()->addMinutes(2), function(){

           return  $post = Post::with('category')->paginate(5);
        });
        
        
        return view('pages.blog',[

            'posts' => Post::with('category', 'user')
                ->where('title', 'like', '%' .$search. '%')
                ->orWhere('content', 'like', '%' .$search. '%')
                ->get(),
            'title' => "Blog",
            // compact('posts')
        ]);
    }



    


    




    public function single(Post $post){

        
        $category = $post->category;

        return view ('pages.blog-details', [

            
            'data' => $post,
            'category' => $category
           
            
        ]);
    }

    public function model_test(){

        dd(Post::some() );


        
    }


    public function test(){

        $single_post = DB::table('posts')->get()->first()->name;
        
    }


    public function categoryWisePosts(Category $category){
        
        return view('pages.category', [

            'title' => $category->name,
            'posts' => $category->posts
        ]);
    }

    public function userBasedPost(User  $user){

        return view ('pages.user-post', [

            'title' => $user->name,
            'posts' => $user->posts

            
        ]);
    }

        

}



