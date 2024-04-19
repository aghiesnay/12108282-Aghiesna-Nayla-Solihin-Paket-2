@extends('layout')
@section('content')

	<!-- MAIN -->
	<main>
		<div class="text-center"> <!-- Centering content -->
            <h1 class="title">Edit User</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Edit User</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>User</h3>
                </div>
                <div>
                    <form action="{{ route('updateUser', $user->id)}}" method="POST" class="mx-3">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex row">
                            <label>Username</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="d-flex row">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}">
                        </div>
                        <div class="d-flex row">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="d-flex row">
                            <label>Role</label>
                            <input type="text" name="role" class="form-control" value="{{$user->role}}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>

            
        </div>
	</main>
	<!-- MAIN -->

@endsection