
@extends('layouts.head')

@section('content')





<table>

    <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            
    </tr>



    @foreach($Students as $s)
    <tr>
        <td>{{$s->id}}</td>
        <td><a href="{{route('admin.studentdetail',['id'=>encrypt($s->id)])}}">{{$s->st_name}}</a></td>
        <td>{{$s->st_username}}</td>
        <td>{{$s->st_phone}}</td>
        <td>{{$s->st_email}}</td>
        <td>{{$s->st_address}}</td>
        <td><a href="{{route('admin.studentdelete',['id'=>encrypt($s->id)])}}">Delete</a></td>
        <td><a href="{{route('admin.studentedit',['id'=>encrypt($s->id)])}}">Edit</a></td>
      

    </tr>
    @endforeach
</table>

@endsection