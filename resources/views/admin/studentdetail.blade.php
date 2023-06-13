
@extends('layouts.head')

@section('content')


<h1>Student Information</h1>

    <h3>  {{$student->st_pro_pic}}</h3>
    <h3>Name: {{$student->st_name}}</h3>
    <h3>Id: {{$student->id}}</h3>
    <h3>Username: {{$student->st_username}}</h3>
    <h3>Phone: {{$student->st_phone}}</h3>
    <h3>Email: {{$student->st_email}}</h3>
    <h3>Address: {{$student->st_address}}</h3>

<table>
Courses
    <tr>
        <th>Course ID</th>
        <th>Course status</th>
        
      
    </tr>


     


    @foreach($student->courses as $sc)
    <tr>
        <td><a href="{{route('admin.coursedetail',['id'=>encrypt($sc->c_id)])}}">{{$sc->c_id}}</td>
        <td>{{$sc->sc_status}}</td>
        
        
               
    </tr>
     @endforeach
</table>

@endsection