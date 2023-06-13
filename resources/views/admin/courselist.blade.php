
@extends('layouts.head')

@section('content')


<table>
<tr><td width="110px"></td><td width="290px"></td></tr>

    <tr>
            <th>Course Id</th>
            <th>Course Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Feedback</th>
            <th>Thumbnail</th>
            <th>Status</th>
            <th>Action</th>
    </tr>



    @foreach($courses as $c)
    <tr>
        <td>{{$c->id}}</td>
        <td><a href="{{route('admin.coursedetail',['id'=>encrypt($c->id)])}}">{{$c->c_title}}</a></td>
        <td>{{$c->c_description}}</td>
        <td>{{$c->c_price}}</td>
        <td>{{$c->c_adminfeedback}}</td>
        <td>{{$c->c_thumbnail}}</td>
        <td>{{$c->c_status}}</td>  
        <td><a href="{{route('admin.coursedelete',['id'=>encrypt($c->id)])}}">Delete</a></td>
        <td><a href="{{route('admin.courseedit',['id'=>encrypt($c->id)])}}">Edit</a></td>
      

    </tr>
    @endforeach
</table>

@endsection