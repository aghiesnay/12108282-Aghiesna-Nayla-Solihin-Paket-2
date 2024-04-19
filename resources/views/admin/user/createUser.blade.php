@extends('layout')
@section('content')
    <!-- MAIN -->
    <main>
        <div class="text-center"> <!-- Centering content -->
            <h1 class="title">Add User</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Add User</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>User</h3>
                </div>
                <div>
                    <form action="/create-user" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                          </div>
                          <div class="col">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                          </div>
                        </div>
                        <div class="row">
                            <div class="col input-field">
                              <label>Password</label>
                              <input type="password" class="form-control" name="password">
                            </div>
                            <div class="col">
                              <label>Role</label>
                              <select class="custom-select" id="inputGroupSelect04" name="role">
                                <option selected>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="employee">Employee</option>
                              </select>
                            </div>
                          </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>   
        </div>
    </main>
    <!-- MAIN -->
@endsection
