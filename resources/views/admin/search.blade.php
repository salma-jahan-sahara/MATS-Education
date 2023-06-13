
@extends('layouts.head')

@section('content')



<table>
 
<tr>
        <th>Student Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        
</tr>



@foreach($students as $s)
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


<table>

    <tr>
            <th>Instructor Id</th>
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



    @foreach($instructors as $i)
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

<table>

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