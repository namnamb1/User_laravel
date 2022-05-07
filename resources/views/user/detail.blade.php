@extends('layout')
@section('content')
<div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
    <h2>Detail</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Avatar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>
                    <img src="{{asset('storage/' . $user->avatar)}}" alt="" style="width: 100px; height: 100px">
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection