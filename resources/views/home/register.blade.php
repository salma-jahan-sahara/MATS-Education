@extends('layouts.app')
@section('content')

<form action="{{route('register.submit')}}" method="post">
      {{@csrf_field()}}

      <input type="text" name="name" value="{{old('name')}}" placeholder="Name">
      @error('name')
      <span>{{$message}}</span>
      @enderror

      <br>
      <input type="text" name="id" value="{{old('id')}}" placeholder="University ID">
      @error('id')
      <span>{{$message}}</span>
      @enderror

      <br>
      <input type="text" name="uname" value="{{old('uname')}}" placeholder="Username">
      @error('uname')
      <span>{{$message}}</span>
      @enderror

      <br>
      <input type="text" name="cgpa" value="{{old('cgpa')}}" placeholder="CGPA">
      @error('cgpa')
      <span>{{$message}}</span>
      @enderror

      <br>
      <input type="text" name="dept" value="{{old('dept')}}" placeholder="Department">
      @error('dept')
      <span>{{$message}}</span>
      @enderror

      <br>
      <input type="password" name="pass" value="{{old('pass')}}"  placeholder="Password">
      @error('pass')
      <span>{{$message}}</span>
      @enderror

      <br>
      <input type="password" name="cpass" value="{{old('cpass')}}"  placeholder="Confirm Password">
      @error('cpass')
      <span>{{$message}}</span>
      @enderror

      <br>
      <input type="text" name="phone" value="{{old('phone')}}"  placeholder="Phone Number">
      @error('phone')
      <span>{{$message}}</span>
      @enderror

      <br>
      <input type="submit"><br>
</form><br><br><br>
 
@endsection()