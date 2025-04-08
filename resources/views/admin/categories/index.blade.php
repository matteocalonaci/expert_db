@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <h1 class="mb-4">Categorie</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Crea Nuova Categoria</a>

    <div class="list-group">
        @foreach ($categories as $category)
            <div class="list-group-item">
                <h5 class="mb-1">
                    <a href="javascript:void(0);" class="category-toggle" data-category-id="{{ $category->id }}">
                        <i class="toggle-icon fas fa-plus" id="icon-{{ $category->id }}"></i>
                        {{ $category->name }}
                    </a>
                </h5>
                <ul class="list-unstyled subcategories" id="subcategories-{{ $category->id }}" style="display: none; transition: max-height 0.3s ease;">
                    @foreach ($category->subcategories as $subcategory)
                        <li class="mb-2">
                            <span>- {{ $subcategory->name }}</span>
                            <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="btn btn-warning btn-sm float-right ml-2">Modifica</a>
                            <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-right">Elimina</button>
                            </form>
                            <a href="{{ route('admin.products.index', ['subcategory_id' => $subcategory->id]) }}" class="btn btn-info btn-sm float-right mr-2">Vedi Prodotti</a>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('admin.subcategories.create', ['category_id' => $category->id]) }}" class="btn btn-success btn-sm mt-2">Crea Sottocategoria</a>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggles = document.querySelectorAll('.category-toggle');

        toggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-category-id');
                const subcategoriesList = document.getElementById('subcategories-' + categoryId);
                const icon = document.getElementById('icon-' + categoryId);

                if (subcategoriesList) {
                    if (subcategoriesList.style.display === 'block') {
                        subcategoriesList.style.display = 'none';
                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus');
                    } else {
                        subcategoriesList.style.display = 'block';
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus');
                    }
                }
            });
        });
    });
</script>
@endsection
