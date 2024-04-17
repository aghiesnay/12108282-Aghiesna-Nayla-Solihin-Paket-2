@extends('layout')

@section('content')
    <!-- MAIN -->
    <main>
        <div class="text-center">
            <h1 class="title">Penjualan Barang</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Penjualan Barang</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Produk</h3>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title">buku</h5>
                                        <p class="card-text">12.000</p>
                                        <p class="card-text">3</p>
                                        <div class="input-group mb-3">
                                            <button class="btn btn-secondary decrement">-</button>
                                            <input type="number" class="form-control quantity" value="0" min="0" max="3" data-index="" style="width: 60px;">
                                            <button class="btn btn-secondary increment" data-index="">+</button>
                                        </div>
                                        <form action="" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value=""> <!-- Menggunakan ID produk sebagai nilai indeks -->
                                            <input type="hidden" name="quantity" value="0" class="quantity-field">
                                            <button type="submit" class="btn btn-primary add-to-cart">Add to Cart</button>
                                        </form>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
