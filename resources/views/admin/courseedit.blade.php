
@extends('layouts.head')

@section('content')

<h1>Course Information Edit:</h1>

<form action="{{route('admin.courseeditsubmit')}}" method="post">

{{@csrf_field()}}   

<input type ='hidden'  name='id' value='{{$course->id}}'>

    Course Logo: {{$course->c_thumbnail}}
    <br>
    Course Id: {{$course->id}}
    <br>
    Course Title:
    <input type="text" name="c_title" value="{{$course->c_title}}" placeholder="Course Title">
    @error('name')
	<span>{{$message}}</span>
	@enderror
    <br>

    Course Price:
    <input type="text" name="c_price" value="{{$course->c_price}}" placeholder="Course Price">
    @error('name')
	<span>{{$message}}</span>
	@enderror
    <br>

   
    Course Feedback:
    <input type="text" name="c_adminfeedback" value="{{$course->c_adminfeedback}}" placeholder="Course Feedback">
    @error('name')
	<span>{{$message}}</span>
	@enderror
    <br>

    Course Status:
    <input type="text" name="c_status" value="{{$course->c_status}}" placeholder="Course Status">
    @error('name')
	<span>{{$message}}</span>
	@enderror
    <br>


	<input type="submit"  ><br>
</form>    
@endsection