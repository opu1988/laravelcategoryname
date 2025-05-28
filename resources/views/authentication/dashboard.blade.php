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


                    <h1>Hello</h1>
                    
                </div>
            </div>
        </div>
    </div>
@endsection