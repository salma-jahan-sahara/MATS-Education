
@extends('layouts.head')

@section('content')


<h1>Instructor Information Edit:</h1>

<form action="{{route('admin.instructoreditsubmit')}}" method="post">

{{@csrf_field()}}   

<input type ='hidden'  name='id' value='{{$instructor->id}}'>

    
    <br>
    Instructor Id: {{$instructor->id}}
    <br>
    Instructor Name:
    <input type="text" name="ins_name" value="{{$instructor->ins_name}}" placeholder="Instructor Name">
    @error('ins_name')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Degree:
    <input type="text" name="ins_degree" value="{{$instructor->ins_degree}}" placeholder="Instructor Degree">
    @error('ins_degree')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Biography:
    <input type="text" name="ins_bio" value="{{$instructor->ins_bio}}" placeholder="Instructor Biography">
    @error('ins_bio')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Phone:
    <input type="text" name="ins_phone" value="{{$instructor->ins_phone}}" placeholder="Instructor Phone">
    @error('ins_phone')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Email:
    <input type="text" name="ins_email" value="{{$instructor->ins_email}}" placeholder="Instructor Email">
    @error('ins_email')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Expricence:
    <input type="text" name="ins_exp" value="{{$instructor->ins_exp}}" placeholder="Instructor Expricence">
    @error('ins_exp')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor JoinDate: {{$instructor->ins_joindate}}


    <br>
    
	<input type="submit"  ><br>
</form>    


@endsection