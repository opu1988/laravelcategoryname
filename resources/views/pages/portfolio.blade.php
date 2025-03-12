@extends('components.layout')

@section('content')

    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">portfolio page</h2>
                    <a href="#">home</a><span> / portfolio page</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Item Area Starts -->
    @include('components.portfolio-item-area')

    <!-- Call To Action Area Starts -->
    @endsection

