@extends('layout')
@section('content')
<h2>Create user</h2>
    <form action="/users/create" method="post">
        @csrf
        <label for="Name">
            Name:
            <input type="text" name="name">
        </label><br><br>
        <label for="Email">
            Email:
            <input type="text" name="email">
        </label><br><br>
        <label for="Password">
            Password:
            <input type="text" name="password">
        </label><br><br>
        <button type="submit">Create user</button>
    </form>
@endsection
