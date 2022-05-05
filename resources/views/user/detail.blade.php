@extends('layout')
@section('content')
<h2>Detail</h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>
                <a class="badge badge-primary" href="{{asset('users/edit/'.$user->id)}}">Edit</a>
                <a class="badge badge-primary" href="{{asset('users/delete/'.$user->id)}}">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection