
@extends('layouts.head')

@section('content')


<table>

    <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Degree</th>
            <th>Bio</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Exprience</th>
            <th>Joindate</th>
            <th>Action</th>
    </tr>



    @foreach($Instructors as $i)
    <tr>
        <td>{{$i->id}}</td>
        <td><a href="{{route('admin.instructordetail',['id'=>encrypt($i->id)])}}">{{$i->ins_name}}</a></td>
        <td>{{$i->ins_username}}</td>
        <td>{{$i->ins_degree}}</td>
        <td>{{$i->ins_bio}}</td>
        <td>{{$i->ins_phone}}</td>
        <td>{{$i->ins_email}}</td>
        <td>{{$i->ins_exp}}</td>
        <td>{{$i->ins_joindate}}</td>
        
        <td><a href="{{route('admin.instructordelete',['id'=>encrypt($i->id)])}}">Delete</a></td>
        <td><a href="{{route('admin.instructoredit',['id'=>encrypt($i->id)])}}">Edit</a></td>
      

    </tr>
    @endforeach
</table>


@endsection