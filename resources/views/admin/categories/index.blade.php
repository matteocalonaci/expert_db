@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-5" style="background-color: rgb(246, 140, 31); min-height: calc(100vh - 6rem);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-outline">Categorie</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Crea Nuova Categoria</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="list-group">
        @foreach ($categories as $category)
            <div class="list-group-item" style="background-color: rgb(255, 176, 28)">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <a href="javascript:void(0);" class="category-toggle" data-category-id="{{ $category->id }}">
                            <i class="toggle-icon fas fa-plus" id="icon-{{ $category->id }}"></i>
                            {{ $category->name }}
                        </a>
                    </h5>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">  <i class="fas fa-edit text-white icon-size"></i></a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>

                <div class="row justify-content-center subcategories mt-3" id="subcategories-{{ $category->id }}" style="display: none;">
                    @if ($category->subcategories->isEmpty())
                        <div class="col-12 text-center mb-2">Nessuna sottocategoria disponibile.</div>
                    @else
                        @foreach ($category->subcategories as $subcategory)
                            <div class="col-md-4 d-flex justify-content-center mb-3">
                                <div class="card text-center shadow-sm w-100" style="max-width: 300px;">
                                    <div class="card-body d-flex flex-column align-items-center">
                                        <h5 class="card-title">{{ $subcategory->name }}</h5>
                                        <div class="mt-3 d-flex gap-2">
                                            <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" class="btn btn-warning btn-sm">  <i class="fas fa-edit text-white icon-size"></i></a>
                                            <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" onsubmit="return confirm('Eliminare questa sottocategoria?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <a href="{{ route('admin.subcategories.create', ['category_id' => $category->id]) }}" class="btn btn-success btn-sm mt-3">Crea Sottocategoria</a>
            </div>
        @endforeach
    </div>
</div>

{{-- Script toggle --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.category-toggle').click(function() {
            var categoryId = $(this).data('category-id');
            $('#subcategories-' + categoryId).toggle();
            $('#icon-' + categoryId).toggleClass('fa-plus fa-minus');
        });
    });
</script>

{{-- Stile per testo con contorno --}}
<style scoped>
.text-outline {
    color: white;
    text-shadow: -1px -1px 0 #000,
                 1px -1px 0 #000,
                -1px  1px 0 #000,
                 1px  1px 0 #000;
}
</style>
@endsection
