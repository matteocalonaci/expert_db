@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <h1 class="mb-4">Ordini</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary mb-3">Crea Nuovo Ordine</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Cliente</th>
                <th>Importo Totale</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>
                        <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display:inline;">
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
