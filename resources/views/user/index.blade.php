@extends('layout')
@section('content')
<h2>List users</h2>
<section class="w-100 p-4 pb-4 d-flex justify-content-center align-items-center flex-column">
    <form class="input-group rounded" action="{{asset('users/search')}}">
    <input type="search" name="query" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search"></i>
    </span>
    </form>
</section>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $val)
        <tr>
            <td>{{ $val->id }}</td>
            <td>{{ $val->name }}</td>
            <td>{{ $val->email }}</td>
            <td>
                <a class="btn btn-primary" href="{{asset('users/edit/'.$val->id)}}">Edit</a>
                <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{asset('users/delete/'.$val->id)}}">Delete</a>
                <a class="btn btn-success" href="{{asset('users/show/'.$val->id)}}">Detail</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$users->appends(request()->query())->links()}}
@endsection