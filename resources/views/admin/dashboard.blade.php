@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-3 pb-3" style="background-color: rgb(246, 140, 31); min-height: calc(100vh - 6rem);">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="text-center text-outline pt-5 text-white">{{ __('Navigazione') }}</h1>
            <div class="row pt-5">
                <div class="col-md-4">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary btn-lg btn-block custom-btn">
                        <i class="fas fa-th-list mx-1"></i> Categorie
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-success btn-lg btn-block custom-btn">
                        <i class="fas fa-box mx-1"></i> Prodotti
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-warning btn-lg btn-block custom-btn">
                        <i class="fas fa-shopping-cart mx-1"></i> Ordini
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style scoped>
    .text-outline {/* Colore del testo */
        text-shadow:
            -1px -1px 0 #000,
            1px -1px 0 #000,
            -1px 1px 0 #000,
            1px 1px 0 #000;
    }

    .custom-btn {
        height: 100px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: rgb(255, 176, 28);
        color: white;
        transition: background-color 0.3s, color 0.3s;
    }

    .custom-btn:hover {
        background-color: rgb(255, 140, 0);
        color: white;
    }
</style>
@endsection
