@extends('layouts.app')

@section('content')
<div class="container p-3">
    <h2>Modifica prodotto: {{ $product->name }}</h2>

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

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome Prodotto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->available_quantity) }}" required>
        </div>

        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $product->brand) }}" required>
        </div>

        <div class="form-group">
            <label for="subcategory_id">Sottocategoria</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                <option value="">Seleziona una sottocategoria</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">URL Immagine</label>
            <input type="url" class="form-control" id="image" name="image" value="{{ old('image', $product->image) }}" placeholder="https://example.com/image.jpg">

            <!-- Mostra l'immagine corrente, se presente -->
            @if ($product->image)
                <div class="mt-3">
                    <strong>Immagine corrente:</strong><br>
                    <img src="{{ $product->image }}" alt="Immagine prodotto" style="max-width: 300px; max-height: 300px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary ">Aggiorna Prodotto</button>
    </form>
</div>
@endsection
