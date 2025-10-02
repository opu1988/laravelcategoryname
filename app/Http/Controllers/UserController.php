<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $keyword = request('search');
       $title = "All Users";
        $users = User::where('name', 'like', '%'.$keyword.'%')
        ->orwhere('username', 'like', '%' .$keyword. '%')
        ->orwhere('email', 'like', '%' .$keyword. '%')
        ->orderBy('id', 'desc')->paginate(5);


        return view('admin.users.users', compact('users', 'keyword', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.users.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'name'       => 'required',
            'email'      => 'email|unique:users',
            'password'   => 'min:8|required|confirmed',
            'password_confirmation' => 'min:8|required',
            'photo'     => 'required|image|mimes:jpg, png' 
            
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = implode('-', explode(' ', trim(strtolower($request->name)) ) );
        $user->email = $request->email;
        $user->password = bcrypt( $request->password);
        

        $photo_name = $request->file('photo')->hashName();
        $request->file('photo')->storeAs('public/images',  $photo_name);

        $user->photo = $photo_name;

        $user->save;

        return back()->with('message', 'user added successfully');
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
    public function edit(User $user)
    {
        

        return view('admin.users.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User  $user)
    {
        
        $user->delete();

        return back()->with('message', 'user has been removed successfully');
    }
}
