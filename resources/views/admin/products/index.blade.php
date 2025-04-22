@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-3 pb-3" style="background-color: rgb(246, 140, 31); min-height: calc(100vh - 6rem);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-outline">Prodotti</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus mr-1"></i> Crea Nuovo Prodotto
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered mb-0">
            <thead class="thead-light text-center">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Prezzo</th>
                    <th>Stock</th>
                    <th>Brand</th>
                    <th style="width: 120px;">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ Str::limit($product->name, 30, '...') }}</td>
                        <td>{{ Str::limit($product->description, 100, '...') }}</td>
                        <td>€{{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>{{ $product->available_quantity }}</td>
                        <td>{{ $product->brand }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                {{-- Modifica --}}
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="btn btn-warning btn-sm mx-1"
                                   data-toggle="tooltip"
                                   title="Modifica">
                                    <i class="fas fa-edit text-white icon-size"></i>
                                </a>

                                {{-- Elimina --}}
                                <form action="{{ route('admin.products.destroy', $product) }}"
                                      method="POST"
                                      onsubmit="return confirm('Sei sicuro di voler eliminare questo prodotto?');"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-danger btn-sm mx-1"
                                            data-toggle="tooltip"
                                            title="Elimina">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<style scoped>
.text-outline {
    color: white;
    text-shadow:
        -1px -1px 0 #000,
         1px -1px 0 #000,
        -1px  1px 0 #000,
        1px  1px 0 #000;
}

.icon-size {
    font-size: 1rem;
    display: inline-block;
    line-height: 1;
    margin: 0;
}
</style>
@endsection
