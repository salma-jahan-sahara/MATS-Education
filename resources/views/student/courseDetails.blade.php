<!DOCTYPE html>
<html lang="en">
<head>
      <title>{{$course->c_title}}</title>
</head>
<body>
@extends('layouts.app1')
@section('content')
<br><br>
      <center>
<table border="2px" width="500px">

		<tr>
    		<td>
				<img src="{{asset('storage/coursethumbnail/'.$course->c_thumbnail)}}" width="100%" height="200px"><br>
					<h2>{{$course->c_title}}</h2>
					<p>{{$course->c_description}}</p>
					
					<p>Created by <a href="#">
						@foreach($instructors as $i)
	@if($course->c_instructor_fk==$i->id)
{{$i->ins_name}}
@endif
						@endforeach
					</a></p>
					<br>
					<?php $n=0;
		$tot=0; ?>
						@foreach ($ratings as $r)
						@if($course->id == $r->c_id)
						<?php $n++; 
						 $tot+=$r->r_rating; ?>
						@endif
						@endforeach
						<?php if($n==0){
						$n=1;}
						 $avg=$tot/$n;?>
						<span>Rating: {{$avg}}</span><br>

					<span>Price:{{$course->c_price}}</span>

                    <form action="/courses/details/{{$c_id}}" method = "post">
                    {{@csrf_field()}}
                    <input type="hidden" name="c_id" value="{{$course->id}}">
                    <input type="hidden" name="c_name" value="{{$course->c_title}}">
                    <input type="hidden" name="c_price" value="{{$course->c_price}}">
                    <input type="submit" value="Enroll">
                    </form>
			</td>
		</tr> 
		
		<tr>
			<td>
			
			</td>	
		</tr>
	</table>
</center>
@endsection
</body>
</html>