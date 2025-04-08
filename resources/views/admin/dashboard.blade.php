@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar di navigazione -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('Navigazione') }}</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('admin.categories.index') }}" class="text-decoration-none">Categorie</a></li>
                    <li class="list-group-item"><a href="{{ route('admin.products.index') }}" class="text-decoration-none">Prodotti</a></li>
                    <li class="list-group-item"><a href="{{ route('admin.orders.index') }}" class="text-decoration-none">Ordini</a></li>
                    {{-- <li class="list-group-item"><a href="{{ route('admin.order_details.index') }}" class="text-decoration-none">Dettagli Ordini</a></li> --}}
                    <!-- Aggiungi altre voci di menu qui -->
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center">{{ __('Benvenuto nel pannello di amministrazione!') }}</h2>
                    <p class="text-center">{{ __('Utilizza il menu a sinistra per navigare tra le diverse sezioni.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
