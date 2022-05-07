@extends('layout')
@section('content')
<section class="w-100 p-4 pb-4 d-flex justify-content-center align-items-center flex-column">
    <h2>List users</h2>
    <a class="btn btn-lg btn-primary" href="{{ route('users.create') }}">Create new</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $val)
            <tr>
                <td>{{ $val->id }}</td>
                <td>{{ $val->name }}</td>
                <td>{{ $val->email }}</td>
                <td><img src="{{asset('storage/' . $val->avatar)}}" alt="" style="width: 100px; height: 100px"></td>
                <td>
                    <a class="btn btn-primary" href="{{ asset('users/'.$val->id.'/edit') }}">Edit</a>
                    <form action="{{ route('users.destroy', ['user' => $val->id]) }}" method="post">
                        @csrf
                        @method('Delete')
                        <input type="submit" class="btn btn-danger"  value="Delete" onclick="return confirm('Do you really want to delete?')"/>
                    </form>
                    <a class="btn btn-success" href="{{asset('users/'.$val->id)}}">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>

{{$users->appends(request()->query())->links()}}
@endsection