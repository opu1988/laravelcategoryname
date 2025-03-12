@extends('components.layout')

@section('content')

    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">blog details page</h2>
                    <a href="{{ route('single-post', $data->slug) }}">home</a><span> / blog details page</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Details Area Starts -->
    @include('components.blog-details')

    <!-- Call To Action Area Starts -->
 @endsection 