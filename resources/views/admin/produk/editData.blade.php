@extends('layout')
@section('content')

	<!-- MAIN -->
	<main>
		<div class="text-center"> <!-- Centering content -->
            <h1 class="title">Edit Data</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Edit Data</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Produk</h3>
                </div>
                <div>
                    <form action="" method="POST" class="mx-3">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex row">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control">
                        </div>
                        <div class="d-flex row">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                        <div class="d-flex row">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>

            
        </div>
	</main>
	<!-- MAIN -->

@endsection