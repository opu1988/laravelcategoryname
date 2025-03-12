@extends('components.layout')

@section('content')

    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">{{ $title }}</h2>
                    <a href="{{ route('home') }}">home</a><a href="{{ route('blog') }}"> / {{ $title }}</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Area Starts -->
    @include('components.blog-area')

   @endsection 