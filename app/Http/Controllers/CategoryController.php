<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request('search');
        $title = "All Categories";
        $categories = Category::where('name', 'like', '%'.$keyword.'%')
            ->orwhere('slug', 'like', '%' .$keyword. '%')
            ->orderBy('id', 'desc')->paginate(5);

        $all_cats = Category::all();

        return view('admin.categories.index', compact('keyword', 'categories', 'all_cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $category = new Category;
        $category->name = $request->category_name;

        $category->slug = strtolower( implode( '-', explode (' ', $request->category_name) ) );

        if( $category->save() ){

            return back()->with('message', 'category has been saved');
        }
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

        $keyword = request('search');
        $title = "Edit Categories";
        $current_category = Category::firstWhere('id', $id);

        $categories = Category::where('name', 'like', '%'.$keyword.'%')
            ->orwhere('slug', 'like', '%' .$keyword. '%')
            ->orderBy('id', 'desc')->paginate(5);


        return view('admin.categories.edit', compact('keyword', 'title', 'categories', 'current_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::firstWhere('id', $id);

        $category->name = $request->category_name;

        $category->slug = strtolower(implode('-', explode (' ', $request->category_slug) ) );

        $category->save();

        return back()->with('message', 'Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $new_category = request('new_category');

        $category = Category::firstWhere('id', $id);

        $category->delete();

        // $category->posts()->update(['category_id' => 22]);

        $category->posts()->update(['category_id' => $new_category]);

        return redirect()->route('categories.index')->with('message', 'Category has been removed!');

        
    }
}
