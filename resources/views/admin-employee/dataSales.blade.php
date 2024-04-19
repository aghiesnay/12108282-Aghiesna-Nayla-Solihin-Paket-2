@extends('layout')
@section('content')

	<!-- MAIN -->
	<main>
		<div class="text-center"> <!-- Centering content -->
            <h1 class="title">Data Sales</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Data Sales</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Data Sales</h3>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> Name</th>
                                <th scope="col">Date Sale</th>
                                <th scope="col">Total Price</th>
								<th scope="col">Made By</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$sale->customer->name ?? 'Nama tidak tersedia' }}</td>
                                    <td>{{$sale->sales_date}}</td>
                                    <td>{{ 'Rp ' . number_format($sale->total_price, 2, ',', '.') }}</td>
                                    <td>{{$sale->user->name ?? 'Name tidak tersedia' }}</td>
                                    <td class="d-flex">
                                        <div class="ml-3">
                                            <form method="GET" action="{{ route('detailSale.pdf', ['id' => $sale->id]) }}">
                                                @csrf 
                                                <button type="submit" class="btn btn-warning">Detail</button>
                                            </form> 
                                        </div>
                                        @if(Auth::user()->role == 'admin')
                                            <div class="ml-3">
                                                <form method="POST" action="{{ route('deleteSale', ['id' => $sale->id]) }}">
                                                    @csrf 
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>  
                                            </div>
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</main>
	<!-- MAIN -->

@endsection