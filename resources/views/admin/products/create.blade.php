@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crea un nuovo prodotto</h2>

    <!-- Mostra messaggi di errore -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome Prodotto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
        </div>

        <div class="form-group">
            <label for="image">URL Immagine</label>
            <input type="url" class="form-control" id="image" name="image" value="{{ old('image') }}" placeholder="https://example.com/image.jpg">
        </div>

        <button type="submit" class="btn btn-primary">Crea Prodotto</button>
    </form>
</div>
@endsection
