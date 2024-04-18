@extends('layout')

@section('content')
    <!-- MAIN -->
    <main>
        <div class="text-center">
            <h1 class="title">Sale</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Sale</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Products</h3>
                </div>
                <div class="row">
                    @foreach ($products as $index => $data)
                        <div class="col-md-4">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $data->name }}</h5>
                                            <p class="card-text">{{ 'Rp ' . number_format($data->price, 0, ',', '.') }}</p>
                                            <p class="card-text">Stok: {{ $data->stok }}</p>
                                            <div class="input-group mb-3">
                                                <button class="btn btn-secondary decrement" data-index="{{ $index }}">-</button>
                                                <input type="number" class="form-control quantity" value="0" min="0" max="{{ $data->stok }}" data-index="{{ $index }}" style="width: 60px;">
                                                <button class="btn btn-secondary increment" data-index="{{ $index }}">+</button>
                                            </div>
                                            <form action="{{ route('addToCart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $data->id }}"> <!-- Menggunakan ID produk sebagai nilai indeks -->
                                                <input type="hidden" name="quantity" value="0" class="quantity-field">
                                                <button type="submit" class="btn btn-primary add-to-cart">Add to Cart</button>
                                            </form>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const quantities = document.querySelectorAll('.quantity');
            const quantityFields = document.querySelectorAll('.quantity-field');
            const increments = document.querySelectorAll('.increment');
            const decrements = document.querySelectorAll('.decrement');

            increments.forEach((button, index) => {
                button.addEventListener('click', function() {
                    const input = quantities[index];
                    const max = parseInt(input.max);
                    let currentValue = parseInt(input.value);
                    if (currentValue < max) {
                        input.value = currentValue + 1;
                        quantityFields[index].value = currentValue + 1;
                    }
                });
            });

            decrements.forEach((button, index) => {
                button.addEventListener('click', function() {
                    const input = quantities[index];
                    let currentValue = parseInt(input.value);
                    if (currentValue > 0) {
                        input.value = currentValue - 1;
                        quantityFields[index].value = currentValue - 1;
                    }
                });
            });
        });
    </script>
@endsection
