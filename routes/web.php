<?php

use App\Models\Post;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controller\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get("test", function(){

    return view('test', [
        'information'=> [1,2,3,4,5,6]
    
    ]);
});

Route::get("/", [HomeController::class, 'home'])->name('home');



Route::get("/about", function(){

    return view('pages.about');
});

Route::get("/blog", [BlogController::class, 'index'])->name("blog");

Route::get("/blog-details", function(){

    return view('pages.blog-details');
});



Route::get("/portfolio", function(){

    return view('pages.portfolio');
});

Route::get("/portfolio-details", function(){

    return view('pages.portfolio-details');
});

Route::get("/service", function(){

    return view('pages.service');
});

Route::get("/service-details", function(){

    return view('pages.service-details');
});



Route::get("/contact", function(){

    return view('pages.contact');
});

Route::get("/services", function(){

    return veiw('pages.services');
});


//Post Controller 

Route::get("/posts", [PostController::class, 'index']);

Route::get("/create-post", [PostController::class, 'create']);


Route::get("/update-post", [PostController::class, 'edit']);



Route::get("/delete-post", [PostController::class, 'destroy']);


Route::get('/article{slug}', function($slug){


    

})->name('single-post');

Route::get("/article/{post:slug}", [BlogController::class, 'single'])->name('single-post');


Route::get("/contact/{slug}", function($slug){

    $posts =DB::table("posts")
    ->where('slug', $slug)
    ->first();

});

Route::get('/model-test', [BlogController::class, 'model_test']);


Route::get('/post/{post:slug}', function(Post $post){

    $single_post = $post;

    dd($post->title);
});

Route::get('category/{category}', [BlogController::class, 'categoryWisePosts']);


















   


