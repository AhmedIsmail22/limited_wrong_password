@extends('users.layout')



@section('title')
    Login
@endsection


@section('content')
<form action="{{route("login")}}" class="w-25 mx-auto my-5" method="POST">
  @csrf
  <h3 class="text-center" style="margin-top: 150px">Login</h3>
  <div class="mb-3">
  @if (session()->has("error"))
  <div class="alert alert-danger text-center">
    {{session()->get("error")}}
  </div>
  @endif
  </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" value="{{old("email")}}">
    </div>
    @error('email')
    <div class="alert alert-danger p-0">
        <p class="text-center text-danger">{{$message}}</p>
    </div>
    @enderror
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Passowrd</label>
        <input type="password" class="form-control" name="password">
      </div>
      @error('password')
    <div class="alert alert-danger p-0">
        <p class="text-center text-danger">{{$message}}</p>
    </div>
    @enderror
      <div class="mb-3">
        @if ($TooManyFailed)
        <div class="alert alert-danger text-center">
          You have entered incorrect data three times, <b>try again after <strong>30</strong> seconds</b>
        </div>
        @else
        <input type="submit" class="btn btn-primary" value="Login">
        @endif
      </div>
</form>
@endsection