@extends('layout')
@section('content')

	<!-- MAIN -->
	<main>
		<div class="text-center"> <!-- Centering content -->
            <h1 class="title">Data Pelanggan</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Data Pelanggan</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Data Pelanggan</h3>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>aghies</td>
                                <td>089529322969</td>
                                <td>Jl. Veteran 3 Tapos</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</main>
	<!-- MAIN -->

@endsection