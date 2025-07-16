<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class LoginController extends Controller
{
    public function register(){

        return view('authentication.register', [

            'title' => 'Register'
        ]);
    }


    public function registerPost(Request $request){

        

        $info = $request->validate([


            'name' => 'required|max:200',
            'username' => 'required',
            'photo' => 'required|image|mimes:jpg, png',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // $user = $this->generate($info);

        $user = new User;

        $user->name = $request->name;

        $user->username = $request->username;

        $photo_name = time() . '-' . $request->file('photo')->hashName();
        $request->file('photo')->storeAs('/public/images', $photo_name);

        $user->photo = $photo_name;

        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        
        

        if( $user->save() ){

            
            Auth::login($user);
            return redirect('/dashboard')->with('message', 'Registration Successfully');
        }

        

    }


    public function generate( array $data ){

        return User::create([

            'name' => $data['name'],
            'username' => $data['username'],
            'photo' => $data['photo'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'] ) 
            
            
        ]);

    }


    public function dashboard(){

        
        return view('admin.dashboard', [

            'title' => "Dashboard"
        ]);
    }

    public function login(){

        return view ('authentication.login', [

            'title' => "Login"
        ]);

    }

    public function loginPost(Request  $request){

        $credit = $request->validate([

            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email',$credit['email'])->first();
        
        
        if( Auth::attempt($credit) ){

            $request->session()->regenerate();

            return redirect('dashboard');
        }else{

            return redirect('login')->with('message', 'password is wrong'); 
        }
    }



    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}



