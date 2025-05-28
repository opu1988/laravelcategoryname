@extends('components.layout')

@section('content')

    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    
                    <h2 class="title">
                        
                        @if(request('search'))
                            Search result for: {{ request('search') }}

                        @else
                                {{ $title }}
                        @endif
                        
                    </h2>
                    <a href="{{ route('home') }}">home</a>
                    @if(request('search'))
                        <a href=""> 
                          /
                        Search result for: {{ request('search') }}
                    @else
                             {{ $title }}
                         </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Area Starts -->
    @include('components.blog-area', [
        
            'posts' => $posts
        ]);

   @endsection 