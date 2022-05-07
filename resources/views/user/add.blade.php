@extends('layout')
@section('content')
<div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
    <h2>Create user</h2>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        @endif
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <label for="Name">
            Name:
            <input class="form-control" type="text" name="name">
        </label><br><br>

        <label for="Email">
            Email:
            <input class="form-control" type="text" name="email">
          
        </label><br><br>

        <label for="Password">
            Password:
            <input class="form-control" type="text" name="password">
           
        </label><br><br>

        <div class="form-group">
            <label for="exampleFormControlFile1">Add avatar</label>
            <input type="file" name="avatar" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <button type="submit" class="btn btn-primary">Create user</button>
    </form>
</div>

@endsection
