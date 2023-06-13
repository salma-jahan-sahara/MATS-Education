
@extends('layouts.head')

@section('content')



<html>

        <!-- <div>
            <a href ="admin/studentlist"> List of Students | </a>
            <a href ="admin/instructorlist"> List of Instructrors | </a>
            <a href ="admin/courselist"> List of Courses |</a>
            <a href ="admin/payment_req"> Payments  |</a>
            <a href ="instructor/add_instructor"> Add Instructor  </a>

        </div> -->



<h1> Admin Home Page </h1>

<h2> Search here </h2>

<form action="{{route('admin.search')}}"  method="post">

    {{@csrf_field()}}  
    <input type="text" name="search" placeholder="Search ......"  >

    <input type="submit" name="Search" >

</form>

</html>

@endsection