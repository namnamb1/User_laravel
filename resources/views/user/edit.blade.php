@extends('layout')
@section('content')
<div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
    <h2>Update</h2>
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label for="Name">
            Name:
            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
        </label><br><br>

        <label for="Email">
            Email:
            <input class="form-control" type="text" name="email" value="{{ $user->email }}">
        </label><br><br>

        <label for="Password">
            Password:
            <input class="form-control" type="text" name="password" value="{{ $user->password }}">
        </label><br><br>

        <div class="form-group">
            <img src="{{asset('storage/' . $user->avatar)}}" alt="" style="width: 100px; height: 100px">
            <label for="exampleFormControlFile1">Edit avatar</label>
            <input type="file" name="avatar" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>
@endsection
