@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Modifica Sottocategoria: {{ $subcategory->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome Sottocategoria</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $subcategory->name }}" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug Sottocategoria</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $subcategory->slug }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria Principale</label>
            <select class="form-select" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna Sottocategoria</button>
    </form>
</div>
@endsection
