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
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td class="d-flex">
                                        <div>
                                            <form method="GET" action="{{ route('editUser', $user->id) }}">
                                                @csrf 
                                                <button type="submit" class="btn btn-warning">Edit</button>
                                            </form>                                            
                                        </div>
                                        <div class="ml-3">
                                            <form method="POST" action="{{ route('deleteUser', $user->id) }}">
                                                @csrf 
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>   
                                        </div>
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