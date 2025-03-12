@extends('components.layout')

@section('content')

    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">service details page</h2>
                    <a href="#">home</a><span> / service details page</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details Area Starts -->
   @include('components.service-details-area')
    <!-- Client Area Starts -->
    @include('components.client-area')

    <!-- Social Link Area Starts -->
    @include('components.social-area')

    <!-- Call To Action Area Starts -->
   @endsection