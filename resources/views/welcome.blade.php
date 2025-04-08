@extends('layouts.app')

@section('content')

<div class="jumbotron mb-0" style="height: calc(100vh - 6rem); position: relative; overflow: hidden; color: white;">
    <div class="background-image" style="background-image: url('https://s3-eu-west-1.amazonaws.com/tpd/logos/49b7d41d0000640005042511/0x0.png'); background-size: cover; background-position: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 1;"></div>

    <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.3); z-index: 2;"></div>

    <div class="container h-100 d-flex align-items-center justify-content-center" style="position: relative; z-index: 3;">
        <div class="text-center">
            <h1 class="display-5 fw-bold" style="text-shadow: 2px 2px 4px black;">
                Welcome to the Expert Backend
            </h1>
            <p class="col-md-8 fs-4 mx-auto" style="text-shadow: 1px 1px 2px black;">
                This is your control panel where you can manage all aspects of your application. Use the navigation menu to access different sections.
            </p>
        </div>
    </div>
</div>

@endsection
