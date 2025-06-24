@extends('components.layout');

@section('content')

    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    
                    <h2 class="title">
                        
                         {{ $title }}
                        
                        
                    </h2>
                    <a href="{{ route('home') }}">home</a>
                        <a href=""> 
                            /
                             {{ $title }}
                         </a>
                    
                </div>
            </div>
        </div>
    </section>



    <div class="blog-area padding-120">
        <div class="container">
            <div class="row justify-content-center">
               
                <div class="col-lg-8">


                    <!-- @if($errors->any() )

                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif -->

                    @if(session()->has('message') )
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <h2 class="title">Create an Account</h2>
                    <hr>
                    <form method="post" action="{{ route('registerProcess') }}">
                        @csrf
                        <div class="mb-3">
                            
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Name">

                            @error('name')

                                <div class="text-sm text-danger mb-3">{{ $message }}</div>

                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="enter username">
                            
                        </div>

                        @error('username')

                                <div class="text-sm text-danger mb-3">{{ $message }}</div>

                        @enderror
                        <div class="mb-3">
                            
                            <input type="text" name="photo" class="form-control" value="{{ old('photo') }}" placeholder="Photo url">
                            
                        </div>
                        @error('photo')

                                <div class="text-sm text-danger mb-3">{{ $message }}</div>

                        @enderror
                        <div class="mb-3">
                            
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        @error('email')

                                <div class="text-sm text-danger mb-3">{{ $message }}</div>

                        @enderror
                        <div class="mb-3">
                            
                            <input type="password" name="password" class="form-control"  id="exampleInputPassword1" placeholder="Enter Password">
                        </div>
                        @error('password')

                                <div class="text-sm text-danger mb-3">{{ $message }}</div>

                        @enderror
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="checkin" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection