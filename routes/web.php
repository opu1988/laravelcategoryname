<?php

use App\Models\Post;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get("/admin/posts", [PostController::class, 'index'])->name('admin-posts');

Route::get("/admin/posts/create", [PostController::class, 'create'])->name('admin.post.create');

Route::post('/admin/posts/store', [PostController::class, 'store'])->name('admin.post.store');

Route::get("/admin/posts/edit/{post}", [PostController::class, 'edit'])->name('admin.post.edit');

Route::put('/admin/posts/update/{post}', [PostController::class, 'update'])->name('admin.post.update');



Route::delete("/admin/posts/delete/{post}", [PostController::class, 'destroy'])->name('admin.post.delete');


Route::get('/test-upload', function(){


    return view('upload-image');
});

Route::post('test-upload', function(Request $request){

    $image = $request->file('thumbnail');

    $image_name = $image->hashname();

    $image->storeAs('/public/images', $image_name);

    return "image upload hoice";
})->name('upload-image');


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

Route::get('category/{category:slug}', [BlogController::class, 'categoryWisePosts']);

Route::get('users/{user:username}', [BlogController::class, 'userBasedPost']);

Route::get('search-page', function(){

    $search_value = request('search');

    $posts = Post::
        where('title', 'like', '%' .$search_value. '%')
        ->orWhere('excerpt', 'like', '%' .$search_value. '%')
        ->orWhere('content', 'like', '%' .$search_value. '%')
        ->get();
    
    return view ('pages.test-search', [

        'posts' => $posts
    ]);
});


// Registration and login routes 


Route::get('register', [LoginController::class, 'register'])->name('register')->middleware('guest');



Route::post('register', [LoginController::class, 'registerPost'])->name('registerProcess');

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'loginPost'])->name('loginProcess');

Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');




















   


