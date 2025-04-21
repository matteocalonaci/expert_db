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
                <h5 class="mb-1">
                    <a href="javascript:void(0);" class="category-toggle" data-category-id="{{ $category->id }}">
                        <i class="toggle-icon fas fa-plus" id="icon-{{ $category->id }}"></i>
                        {{ $category->name }}
                    </a>
                </h5>
                <ul class="list-unstyled subcategories" id="subcategories-{{ $category->id }}" style="display: none;">
                    @if ($category->subcategories->isEmpty())
                        <li class="mb-2">Nessuna sottocategoria disponibile.</li>
                    @else
                        @foreach ($category->subcategories as $subcategory)
                            <li>{{ $subcategory->name }}</li>
                        @endforeach
                    @endif
                </ul>
                <a href="{{ route('admin.subcategories.create', ['category_id' => $category->id]) }}" class="btn btn-success btn-sm mt-2">Crea Sottocategoria</a>
            </div>
        @endforeach
    </div>
</div>

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

<style scoped>
.text-outline {
    color: white;
    text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
}
</style>
@endsection
