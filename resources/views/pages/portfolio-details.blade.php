@extends('components.layout')

@section('content')
    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">portfolio details page</h2>
                    <a href="#">home</a><span> / portfolio details page</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Item About Area Starts -->
    @include('components.portfolio-item-about')

    <!-- Portfolio Item Working Challenge Area Starts -->
    @include('components.portfolio-working')

    <!-- Portfolio Item Working Process Area Starts -->
    @include('components.portfolio-working-process')

    <!-- Portfolio Relavite Project -->
    @include('components.portfolio-relavite')

    <!-- Call To Action Area Starts -->
    @endsection 

    