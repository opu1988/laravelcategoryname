@extends('components.layout')

@section('content')

    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">about page</h2>
                    <a href="#">home</a><span> / about page</span>
                </div>
            </div>
        </div>
    </section>

    <!-- About Area Start -->
    @include('components.shape-area')

    <!-- Feature Area Starts -->
    @include('components.feature-area')

    <!-- Team Member Area Starts -->
    @include('components.team-area')

    <!-- Social Link Area Starts -->
    @include('components.social-area')

    <!-- Call To Action Area Starts -->
   @endsection