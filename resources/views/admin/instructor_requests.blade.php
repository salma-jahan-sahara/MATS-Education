
@extends('layouts.head')

@section('content')


<h1>Instructor Request List:</h1>

<table>

    <tr>
            <th>User Id</th>
            <th>Username</th>
            <th>User Type</th>
            <th>Status</th>


            <th colspan="2">Decision</th>
            
    </tr>



    @foreach($userlogins as $u)
    <tr>
        <td>{{$u->id}}</a></td>
        <td><a href="{{route('admin.instructor_requestsdetail',['id'=>encrypt($u->u_username)])}}">{{$u->u_username}}</a></td>
        <td>{{$u->u_type}}</a></td>
        <td>{{$u->u_access}}</td>
        

        <td><form action="{{route('admin.instructor_requests')}}" method="post">
        {{@csrf_field()}}
        <input type="hidden" name="u_id" value="{{$u->id}}">
        <input type="submit" name="dec" style="background-color: rgb(145, 250, 159);" Value="Accept">
        </form></td>

        <td><form action="{{route('admin.instructor_requests')}}" method="post">
        {{@csrf_field()}}
        <input type="hidden" name="u_id" value="{{$u->id}}">
        <input type="submit" name="dec" style="background-color: rgb(255, 162, 162);" Value="Reject">
        </form></td>


    </tr>
    @endforeach
</table>  


@endsection