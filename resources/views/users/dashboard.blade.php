@extends('users.layout')


@section('title')
    Dashboard
@endsection

@section('content')
<a href="{{route("logout")}}" class="btn btn-danger mx-5 mt-5">Logout</a>
<table class="table table-striped table-hover mx-auto w-75 text-center border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-Mail</th>
            <th scope="col">created_at</th>
            <th scope="col">Actions</th>
        </tr>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <a href="#" class="btn btn-primary justify-content-center">Edit</a>
                    <a href="#" class="btn btn-danger justify-content-center">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>
{{-- <div class="text-center">{{$users->links()}}</div> --}}
@endsection