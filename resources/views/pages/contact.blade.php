@extends('components.layout')
@section('content')

    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">contact page</h2>
                    <a href="#">home</a><span> / contact page</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Area Starts -->
    @include('components.contact-area')

    <!-- Map Area Starts -->
    @include('components.contact-map-area')

    <!-- Call To Action Area Starts -->
    @endsection