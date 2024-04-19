<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sale</title>
    <style>
        .container {
            width: 400px; /* Menyesuaikan lebar kontainer */
            margin: 0 auto;
            font-family: Arial, sans-serif;
            border: 2px solid #000;
            padding: 10px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
        hr {
            border: none;
            border-top: 2px dashed #000;
            margin-bottom: 10px;
        }
        .text-right {
            text-align: right;
        }
        .detail {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Struk</div>
        <hr>

        <div class="text-right">
            <label>Date:</label> {{ date('d-m-Y') }}<br>
            <label>Time:</label> {{ gmdate('H:i:s', time() + (7 * 3600)) }}<br>
        </div>

        @if(isset($customer))
        <div>
            <h4>Data Customer</h4>
            <table>
                <tr>
                    <th>Name</th>
                    <th>No HP</th>
                    <th>Address</th>
                </tr>
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->no_hp }}</td>
                    <td>{{ $customer->address }}</td>
                </tr>
            </table>
        </div>
        @endif

        @if(isset($details) && $details->isNotEmpty())
        <div class="detail">
            <h4>Data Product</h4>
            <table>
                <tr>
                    <th>Name Product</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                </tr>
                <?php $totalPrice = 0; ?>
                @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->amount }}</td>
                    <td>Rp {{ number_format($detail->sub_total, 0, ',', '.') }}</td>
                    <?php $totalPrice += $detail->sub_total; ?>
                </tr>
                @endforeach
                <!-- Tampilkan total price -->
                <tr>
                    <td colspan="2" class="text-right"><b>Total Price:</b></td>
                    <td>Rp {{ number_format($totalPrice, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        @endif

        @if($sale)
        <div class="text-right">
            <h4>Transaction</h4>
            <table>
                <tr>
                    <th>Pay</th>
                    <td>Rp {{ number_format($sale->pay, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Change</th>
                    <td>Rp {{ number_format($sale->change, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        @endif
    </div>
</body>
</html>
