@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4 class="text-center mb-4">{{ __('Navigazione') }}</h4>
            <div class="row pt-5">
                <div class="col-md-4">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary btn-lg btn-block" style="height: 100px; font-size: 1.5rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-th-list"></i> Categorie
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-success btn-lg btn-block" style="height: 100px; font-size: 1.5rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-box"></i> Prodotti
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-warning btn-lg btn-block" style="height: 100px; font-size: 1.5rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-shopping-cart"></i> Ordini
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
