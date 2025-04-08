@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <h1 class="mb-4">Prodotti</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Crea Nuovo Prodotto</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Prezzo</th>
                <th>Stock</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
