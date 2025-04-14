@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-3 pb-3" style="background-color: rgb(246, 140, 31); min-height: calc(100vh - 6rem);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-outline">Ordini</h1>
        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Crea Nuovo Ordine</a>
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
                    <th>Nome Cliente</th>
                    <th>Email Cliente</th>
                    <th>Indirizzo di Spedizione</th>
                    <th>Data Ordine</th>
                    <th>Stato Ordine</th>
                    <th>Importo Totale</th>
                    <th style="width: 120px;">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>{{ Str::limit($order->shipping_address, 50, '...') }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y H:i') }}</td> <!-- Convertito in Carbon -->
                        <td>{{ $order->order_status }}</td>
                        <td>{{ number_format($order->total, 2, ',', '.') }} €</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-warning btn-sm mx-1" data-toggle="tooltip" title="Modifica">
                                    <i class="fa-solid fa-pen text-white"></i>
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Sei sicuro di voler eliminare questo ordine?');" data-toggle="tooltip" title="Elimina">
                                        <i class="fa-solid fa-trash"></i>
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
    document.addEventListener('DOMContentLoaded', function() {
        // Inizializza i tooltip
        $('[data-toggle="tooltip"]').tooltip    });
</script>

<style scoped>
.text-outline {
    color: white; /* Colore del testo */
    text-shadow:
        -1px -1px 0 #000,
        1px -1px 0 #000,
        -1px 1px 0 #000,
        1px 1px 0 #000; /* Contorno nero */
}
</style>
@endsection
