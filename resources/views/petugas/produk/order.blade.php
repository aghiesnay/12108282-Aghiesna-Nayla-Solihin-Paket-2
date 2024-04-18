@extends('layout')
@section('content')
    <!-- MAIN -->
    <main>
        <div class="text-center">
            <h1 class="title">Order</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Order</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Detail Order</h3>
                </div>
                <div>
                    <form action="{{ route('createOrder') }}" method="POST">
                        @csrf
                        <!-- Loop through cart items to display -->
                        @foreach(session('cart', []) as $index => $item)
                            <!-- Display each item in cart -->
                            <div class="row">
                                <div class="col">
                                    <label>Name: {{ $item['name'] }}</label>
                                </div>
                                <div class="col">
                                    <label>Price: {{ 'Rp ' . number_format($item['price'], 0, ',', '.') }}</label>
                                </div>
                                <div class="col">
                                    <label>Qty: {{ $item['amount'] }}</label>
                                </div>
                                <div class="col">
                                    <label>Subtotal: {{ 'Rp ' . number_format($item['price'] * $item['amount'], 0, ',', '.') }}</label>
                                </div>
                            </div>
                        @endforeach

                        <!-- Customer information -->
                        <div class="row">
                            <div class="col">
                                <label for="user">Pilih Employee</label>
                                <select class="custom-select" id="inputGroupSelect04" name="user" id="user">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="name">Customer Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="col">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            </div>
                            <div class="col">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <!-- Add a button to proceed -->
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Process Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
@endsection
