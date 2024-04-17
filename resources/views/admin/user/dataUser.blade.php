@extends('layout')
@section('content')

	<!-- MAIN -->
	<main>
		<div class="text-center"> <!-- Centering content -->
            <h1 class="title">Data User</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Data User</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Data User</h3>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>aghies</td>
                                <td>aghies@gmail.com</td>
                                <td>admin</td>
                                <td class="d-flex">
                                    <div>
                                        <form method="GET" action="">
                                            @csrf 
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>                                            
                                    </div>
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