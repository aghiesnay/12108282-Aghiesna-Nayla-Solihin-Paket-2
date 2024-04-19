@extends('layout')

@section('content')
    <!-- MAIN -->
    <main class="d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1>Welcome,</h1>
            <h2>{{ auth()->user()->name }}!</h2>
            <p>Thank you for using our application.</p>
        </div>
    </main>
    <!-- MAIN -->
@endsection
