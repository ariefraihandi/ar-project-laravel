@extends('layouts/app')

@section('content')
    <form action="{{ route('login.action') }}" method="post">
        @csrf
        <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" required>
        @error('username') Error Bro @enderror
        <br>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login Now</button>
    </form>
@endsection