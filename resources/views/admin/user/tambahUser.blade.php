@extends('layout')
@section('content')
    <!-- MAIN -->
    <main>
        <div class="text-center"> <!-- Centering content -->
            <h1 class="title">Tambah User</h1>
            <ul class="breadcrumbs">
                <li><a href="/dashboard">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Tambah User</a></li>
            </ul>
        </div>

        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>User</h3>
                </div>
                <div>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                          </div>
                          <div class="col">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                          </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <label>Password</label>
                              <input type="text" class="form-control" name="password">
                            </div>
                            <div class="col">
                              <label>Role</label>
                              <select class="custom-select" id="inputGroupSelect04" name="role">
                                <option selected>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
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
