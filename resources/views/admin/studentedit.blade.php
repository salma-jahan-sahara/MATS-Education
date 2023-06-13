
@extends('layouts.head')

@section('content')


<h1>Student Information Edit:</h1>

<form action="{{route('admin.studenteditsubmit')}}" method="post">

{{@csrf_field()}}   

<input type ='hidden'  name='id' value='{{$student->id}}'>

    
student Id: {{$student->id}}
    <br>
    Student Name:
    <input type="text" name="st_name" value="{{$student->st_name}}" placeholder="student name ">
    @error('st_name')
	<span>{{$message}}</span>
	@enderror
    <br>

    Student userName:
    <input type="text" name="st_username" value="{{$student->st_username}}" placeholder="st_username ">
    @error('st_username')
	<span>{{$message}}</span>
	@enderror
    <br>

    Student Phone:
    <input type="text" name="st_phone" value="{{$student->st_phone}}" placeholder="student phone ">
    @error('st_name')
	<span>{{$message}}</span>
	@enderror
    <br>

    Student Email:
    <input type="text" name="st_email" value="{{$student->st_email}}" placeholder="student email ">
    @error('st_email')
	<span>{{$message}}</span>
	@enderror
    <br>

    Student Email:
    <input type="text" name="st_address" value="{{$student->st_address}}" placeholder="student address ">
    @error('st_address')
	<span>{{$message}}</span>
	@enderror
    <br>

    

	<input type="submit"  ><br>
</form>    


@endsection