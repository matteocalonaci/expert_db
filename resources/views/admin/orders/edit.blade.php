@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-3 pb-3" style="background-color: orange; min-height: calc(100vh - 6rem);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-outline">Modifica Ordine #{{ $order->id }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Torna agli Ordini</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.orders.update', $order) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="customer_name" class="form-label">Nome Cliente</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="customer_email" class="form-label">Email Cliente</label>
            <input type="email" class="form-control" id="customer_email" name="customer_email" value="{{ old('customer_email', $order->customer_email) }}" required>
        </div>

        <div class="mb-3">
            <label for="shipping_address" class="form-label">Indirizzo di Spedizione</label>
            <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required>{{ old('shipping_address', $order->shipping_address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Data Ordine</label>
            <input type="datetime-local" class="form-control" id="order_date" name="order_date" value="{{ old('order_date', \Carbon\Carbon::parse($order->order_date)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="order_status" class="form-label">Stato Ordine</label>
            <select class="form-select" id="order_status" name="order_status" required>
                <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>In Attesa</option>
                <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>Completato</option>
                <option value="canceled" {{ $order->order_status == 'canceled' ? 'selected' : '' }}>Annullato</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Importo Totale (€)</label>
            <input type="number" step="0.01" class="form-control" id="total" name="total" value="{{ old('total', $order->total) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna Ordine</button>
    </form>
</div>

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
