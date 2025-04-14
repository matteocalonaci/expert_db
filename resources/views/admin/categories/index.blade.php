@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-5" style="background-color: orange; min-height: calc(100vh - 6rem);">
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
            <div class="list-group-item"style="background-color: rgb(255, 176, 28)">
                <h5 class="mb-1">
                    <a href="javascript:void(0);" class="category-toggle" data-category-id="{{ $category->id }}">
                        <i class="toggle-icon fas fa-plus" id="icon-{{ $category->id }}"></i>
                        {{ $category->name }}
                    </a>
                </h5>
                <ul class="list-unstyled subcategories" id="subcategories-{{ $category->id }}" style="display: none; transition: max-height 0.3s ease;">
                    @if ($category->subcategories->isEmpty())
                        <li class="mb-2">Nessuna sottocategoria disponibile.</li>
                    @else
                        <div class="row">
                            @foreach ($category->subcategories as $subcategory)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $subcategory->name }} <span class="badge bg-secondary">{{ $subcategory->products_count }}</span></h5>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="btn btn-warning btn-sm mx-1" data-toggle="tooltip" title="Modifica">
                                                    <i class="fa-solid fa-pen text-white icon-size"></i>
                                                </a>
                                                <a href="{{ route('admin.products.index', ['subcategory_id' => $subcategory->id]) }}" class="btn btn-info btn-sm mx-1" data-toggle="tooltip" title="Vedi Prodotti">
                                                    <i class="fa-solid fa-eye text-white icon-size"></i>
                                                </a>
                                                <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Sei sicuro di voler eliminare questa sottocategoria?');" data-toggle="tooltip" title="Elimina">
                                                        <i class="fa-solid fa-trash icon-size"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
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

        // Inizializza i tooltip
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<style scoped>
.text-outline {
    color: white;
    text-shadow:
        -1px -1px 0 #000,
        1px -1px 0 #000,
        -1px 1px 0 #000,
        1px 1px 0 #000;
}

.icon-size {
    font-size: 1rem;
    display: inline-block;
    line-height: 1;
    margin: 0;
}
</style>
@endsection
