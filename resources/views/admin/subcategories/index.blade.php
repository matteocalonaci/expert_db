@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <h1 class="mb-4">Sottocategorie</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary mb-3">Crea Nuova Sottocategoria</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" style="display:inline;">
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
