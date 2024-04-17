@extends('layout')
@section('content')
    <!-- MAIN -->
    <main>
        <div class="text-center">
            <h1 class="title">Pemesanan</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Pemesanan</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Detail Pesanan</h3>
                </div>
                <div>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>Nama Produk: buku</label>
                            </div>
                            <div class="col">
                                <label>Harga: 12.000</label>
                            </div>
                            <div class="col">
                                <label>Qty: 3</label>
                            </div>
                            <div class="col">
                                <label>Subtotal: 24.0000</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="user">Pilih Petugas</label>
                                <select class="custom-select" id="inputGroupSelect04" name="user" id="user"> 
                                    <option value="">petugas</option> 
                                </select>
                            </div>
                            <div class="col">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                            </div>
                            <div class="col">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon">
                            </div>
                            <div class="col">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Proses Pesanan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
@endsection
