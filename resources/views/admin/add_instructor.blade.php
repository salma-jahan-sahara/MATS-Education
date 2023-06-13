@extends('layouts.head')

@section('content')


<h1>Instructor Registration:</h1>

<form action="{{route('admin.add_instructorsubmit')}}"  method="post">

        {{@csrf_field()}}   
   
    Instructor Name:
    <input type="text" name="ins_name" value="{{old('ins_name')}}" placeholder="Instructor Name">
    @error('ins_name')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Username:
    <input type="text" name="ins_username" value="{{old('ins_username')}}" placeholder="Instructor userName">
    @error('ins_username')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Password:
    <input type="text" name="ins_password" value="{{old('ins_password')}}" placeholder="Instructor password">
    @error('ins_password')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Degree:
    <input type="text" name="ins_degree" value="{{old('ins_degree')}}" placeholder="Instructor Degree">
    @error('ins_degree')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Biography:
    <input type="text" name="ins_bio" value="{{old('ins_bio')}}" placeholder="Instructor Biography">
    @error('ins_bio')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Phone:
    <input type="text" name="ins_phone" value="{{old('ins_phone')}}" placeholder="Instructor Phone">
    @error('ins_phone')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Email:
    <input type="text" name="ins_email" value="{{old('ins_email')}}" placeholder="Instructor Email">
    @error('ins_email')
	<span>{{$message}}</span>
	@enderror
    <br>

    Instructor Expricence:
    <input type="text" name="ins_exp" value="{{old('ins_exp')}}" placeholder="Instructor Expricence">
    @error('ins_exp')
	<span>{{$message}}</span>
	@enderror
    <br>

    

    <br>
    
	<input type="submit"  >

</form>    


@endsection