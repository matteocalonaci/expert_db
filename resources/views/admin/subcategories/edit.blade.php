@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <h1 class="mb-4">Modifica Sottocategoria</h1>

    <form action="{{ route('admin.subcategories.update', $subcategory) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $subcategory->name }}" required>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $subcategory->slug }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Seleziona una categoria</option>
                <option value="1" {{ $subcategory->category_id == 1 ? 'selected' : '' }}>Elettronica</option>
                <option value="2" {{ $subcategory->category_id == 2 ? 'selected' : '' }}>Elettrodomestici</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna Sottocategoria</button>
    </form>
</div>
@endsection
