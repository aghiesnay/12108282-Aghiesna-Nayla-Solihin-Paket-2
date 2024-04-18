@extends('layout')
@section('content')
    <!-- MAIN -->
    <main>
        <div class="text-center"> <!-- Centering content -->
            <h1 class="title">Products</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Products</a></li>
            </ul>
        </div>

        <div class="data">
            {{-- Hak akses untuk admin --}}  
            @if(Auth::user()->role == 'admin')
                <div class="content-data">
                    <div class="head">
                        <h3>Add Product</h3>
                    </div>
                    <div>
                        <form action="/create-product" method="POST" class="mx-3">
                            @csrf
                            <div class="d-flex row">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="d-flex row">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="d-flex row">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control">
                            </div>
                            <div class="d-flex row">
                                <label>Img</label>
                                <input type="img" name="img" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            @endif          

            {{-- Hak akses untuk admin dan petugas --}}
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'employee')
                <div class="content-data">
                    <div class="head">
                        <h3>Product Datas</h3>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Image</th>
                                    {{-- Hak akses untuk admin --}}
                                    @if(Auth::user()->role == 'admin')
                                        <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</td>
                                        <td>{{$product->stok}}</td>
                                        <td>{{$product->img}}</td>
                                        
                                        {{-- Hak akses untuk admin --}}
                                        @if(Auth::user()->role == 'admin')
                                            <td class="d-flex justify-content-between">
                                                <div>
                                                    <a href="{{ route('editProduct', $product->id)}}" class='bx bxs-edit-alt'></a>
                                                </div>
                                                <div>
                                                    <form method="POST" action="{{ route('deleteProduct', $product->id) }}">
                                                        @csrf 
                                                        <button type="submit" class="bx bxs-trash" style="border: none; background-color: transparent;"></button>
                                                    </form>  
                                                </div>
                                            </td>  
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </main>
    <!-- MAIN -->
@endsection
