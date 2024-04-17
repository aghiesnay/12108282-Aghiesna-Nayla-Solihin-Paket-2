@extends('layout')
@section('content')

	<!-- MAIN -->
	<main>
		<div class="text-center"> <!-- Centering content -->
            <h1 class="title">Data Penjualan</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Data Penjualan</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Data Penjualan</h3>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Tanggal Penjualan</th>
                                <th scope="col">Total Harga</th>
								<th scope="col">Dibuat Oleh</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>bu mumun</td>
                                <td>24-04-15</td>
                                <td>12.000</td>
                                <td>petugas</td>
                                <td class="d-flex">
                                    <div class="ml-3">
                                        <form method="POST" action="">
                                            @csrf 
                                            @method('DELETE') 
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>  
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</main>
	<!-- MAIN -->

@endsection