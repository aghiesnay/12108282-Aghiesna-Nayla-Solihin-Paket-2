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
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset($product->img) }}" alt="Product Image" class="card-img-top product-image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</p>
                                    <p class="card-text">Stok: {{ $product->stok }}</p>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-secondary decrement" data-id="{{ $product->id }}">-</button>
                                        <input type="number" class="form-control quantity" value="0" min="0" max="{{ $product->stok }}" data-id="{{ $product->id }}" style="width: 60px;">
                                        <button class="btn btn-secondary increment" data-id="{{ $product->id }}">+</button>
                                    </div>
                                    <form action="{{ route('addToCart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="0" class="quantity-field">
                                        <button type="submit" class="btn btn-primary add-to-cart">Add to Cart</button>
                                    </form>                                            
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->

    <style>
        .product-image {
            height: 200px; 
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const quantities = document.querySelectorAll('.quantity');
            const quantityFields = document.querySelectorAll('.quantity-field');
            const increments = document.querySelectorAll('.increment');
            const decrements = document.querySelectorAll('.decrement');

            increments.forEach((button, index) => {
                button.addEventListener('click', function() {
                    const productId = button.dataset.id;
                    const input = document.querySelector(`.quantity[data-id="${productId}"]`);
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
                    const productId = button.dataset.id;
                    const input = document.querySelector(`.quantity[data-id="${productId}"]`);
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
