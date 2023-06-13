@extends('layouts.app')
@section('content')
<form action="{{route('login.submit')}}" method="post">
      {{@csrf_field()}}

      
      <input type="text" name="uname" value="{{old('uname')}}" placeholder="Username">
      @error('uname')
      <span>{{$message}}</span>
      @enderror
      <br>
      <input type="password" name="pass" value="{{old('pass')}}"  placeholder="Password">
      @error('pass')
      <span>{{$message}}</span>
      @enderror
      <br>
      <input type="submit"><br>
</form><br><br><br>
@endsection