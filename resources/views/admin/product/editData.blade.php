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
                    <h3>Product</h3>
                </div>
                <div>
                    <form action="{{ route('updateProduct', $product->id) }}" method="POST" class="mx-3" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex row">
                            <label>Name Product</label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}">
                        </div>
                        <div class="d-flex row">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="d-flex row">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{$product->stok}}">
                        </div>
                        <div class="d-flex row">
                            <label>Image</label>
                            @if($product->img)
                                <img src="{{ asset($product->img) }}" alt="Product Image" style="max-width: 200px;">
                                <input type="file" name="img" class="form-control">
                            @else
                                <input type="file" name="img" class="form-control" required>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>

            
        </div>
	</main>
	<!-- MAIN -->

@endsection
