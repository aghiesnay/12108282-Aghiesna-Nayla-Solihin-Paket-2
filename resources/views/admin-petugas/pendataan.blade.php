@extends('layout')
@section('content')
    <!-- MAIN -->
    <main>
        <div class="text-center"> <!-- Centering content -->
            <h1 class="title">Pendataan Barang</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Pendataan Barang</a></li>
            </ul>
        </div>

        <div class="data">
            {{-- Hak akses untuk admin --}}            
            <div class="content-data">
                <div class="head">
                    <h3>Produk</h3>
                </div>
                <div>
                    <form action="/pendataan-barang/create" method="POST" class="mx-3">
                        @csrf
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

            {{-- Hak akses untuk admin dan petugas --}}
            <div class="content-data">
                <div class="head">
                    <h3>Data Produk</h3>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                {{-- Hak akses untuk admin --}}
                                 <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>buku</td>
                                <td>12.000</td>
                                <td>3</td>

                                {{-- Hak akses untuk admin --}}
                                <td class="d-flex justify-content-between">
                                    <div>
                                        <a href="" class='bx bxs-edit-alt'></a>
                                    </div>
                                    <div>
                                        <form method="POST" action="">
                                            @csrf 
                                            @method('DELETE') 
                                            <button type="submit" class="bx bxs-trash" style="border: none; background-color: transparent;"></button>
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
