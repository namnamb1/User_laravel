@extends('layout')
@section('content')
<h2>Update</h2>
    <form action="/users/edit/{{ $user->id }}" method="post">
        @csrf
        <label for="Name">
            Name:
            <input type="text" name="name" value="{{ $user->name }}">
        </label><br><br>
        <label for="Email">
            Email:
            <input type="text" name="email" value="{{ $user->email }}">
        </label><br><br>
        <label for="Password">
            Password:
            <input type="text" name="password" value="{{ $user->password }}">
        </label><br><br>
        <button type="submit">Update</button>
    </form>
@endsection
