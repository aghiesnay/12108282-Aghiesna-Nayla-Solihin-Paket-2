@extends('layout')

@section('content')
    <?php
        // Inisialisasi total price
        $totalPrice = 0;
    ?>
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
                    <!-- Tampilkan daftar item pesanan dalam bentuk tabel -->
                    <div class="row mt-3">
                        <div class="col">
                            <h4>Order Items:</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(session('cart', []) as $index => $item)
                                        <tr>
                                            <td>{{ $item['name'] }}</td>
                                            <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                            <td>{{ $item['amount'] }}</td>
                                            <td>Rp {{ number_format($item['price'] * $item['amount'], 0, ',', '.') }}</td>
                                            <?php
                                                $subtotal = $item['price'] * $item['amount'];
                                                $totalPrice += $subtotal;
                                            ?>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <h4>Total Price:</h4>
                            <p>Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(!session('success'))
                        <form action="{{ route('createOrder') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="user">Employee</label>
                                    <input type="text" class="form-control" id="user" name="user" value="{{ auth()->user()->name }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="name"> Name</label>
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
                            <div class="row">
                                <div class="col">
                                    <label for="pay">Pay : </label>
                                    <input type="text" class="form-control" id="pay" name="pay" oninput="calculateChange()">
                                </div>
                                <div class="col">
                                    <label for="change">Change : </label>
                                    <input type="text" class="form-control" id="change" name="change" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Process Order</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->

    <script>
        function calculateChange() {
            // Total price and pay
            var totalPrice = <?php echo $totalPrice; ?>;
            var pay = document.getElementById('pay').value;

            var change = pay - totalPrice;

            if(change < 0) {
                change = 0;
            }

            // Show change in change input
            document.getElementById('change').value = change.toFixed(0);
        }
    </script>
@endsection
