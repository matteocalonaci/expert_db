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
                        <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" style="display:inline;" id="delete-form-{{ $subcategory->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $subcategory->id }})">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Sei sicuro?',
            text: "Una volta eliminato, non potrai recuperare questo elemento!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Elimina',
            cancelButtonText: 'Annulla'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se l'utente conferma, invia il modulo
                document.getElementById('delete-form-' + id).submit();
            } else {
                Swal.fire('L\'elemento non è stato eliminato!');
            }
        });
    }
</script>
@endsection
