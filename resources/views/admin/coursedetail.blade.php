
@extends('layouts.head')

@section('content')

<h1>Course Information</h1>
    <h3>Course Title: {{$course->c_title}}</h3>
    <h3>Course Id: {{$course->id}}</h3>
    <h3>Course Price: {{$course->c_price}}</h3>
    <h3>Course Feedback: {{$course->c_adminfeedback}}</h3>
    <h3>Course Logo: {{$course->c_thumbnail}}</h3>
    <h3>Course Status: {{$course->c_status}}</h3>
    

    Enrolled students
    <br>
    <table>
    <tr>
            <th> Id</th>
    <tr>
    @foreach($course->students as $s)
    <tr>
         
        <td><a href="{{route('admin.studentdetail',['id'=>encrypt($s->id)])}}">{{$s->id}}</td>
        <td>{{$s->st_name}}</td>
 
               
    </tr>
     @endforeach
     </table>

     @endsection