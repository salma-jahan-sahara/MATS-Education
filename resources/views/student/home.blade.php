<!DOCTYPE html>
<html lang="en">
<head>
      <title>Home</title>
      
      <style>
            /* table, th, td {
                  border: 1px solid black;
                  border-collapse: collapse;}; */
      </style>
</head>
<body>
@extends('layouts.app1')
@section('content')

<center>


<!-- //if session get_browser -->




@if(Session::get('id'))
<?php $x=1; ?>
<table>
		<h2><a href="{{route('purchase')}}"> Enrolled Courses</a></h2>
		<hr style="height:2px;border-width:0;color:gray;background-color:gray">
		@foreach($en_courses as $enc)
		@if ($enc->st_id==Session::get('id'))

			@foreach($courses as $cs)
			@if($enc->c_id==$cs->id)
			@if ($x<=4)
			<td style="width: 200px; border: 1px solid black;
                  border-collapse: collapse; background-color: silver;"><a href="course/{{$cs->id}}"><table><center>
						<img src="{{asset('storage/coursethumbnail/'.$cs->c_thumbnail)}}" width="200px" height="200px"><br>
						
						<span>{{$cs->c_title}}</span>
						
						@foreach ($instructors as $i)
						@if($cs->c_instructor_fk == $i->id)
						<br>{{$i->ins_name}}
						
						@endif
						@endforeach
						<br>			</center></table></a></td><td width="50px"></td>
						<?php $x++; ?>
			@endif
						@endif
						@endforeach

					@endif
		@endforeach
	
</table>
@endif


<!-- /////////////////////// -->
<table>
		
			@foreach($categories as $ctg) <br>
			<?php $x=1; ?>
			<h2><a href="/category/{{$ctg->id}}">{{$ctg->cat_name}}</a></h2>
			<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<table style="">
					<tr>
				@foreach($courses as $cs)
				@if($ctg->id==$cs->c_category_fk)
				@if ($x<=4)
		<td style="width: 200px; border: 1px solid black;
                  border-collapse: collapse; background-color: silver;"><a href="courses/details/{{$cs->id}}"><table style="background-color: silver;"><center>
						<img src="{{asset('storage/coursethumbnail/'.$cs->c_thumbnail)}}" width="200px" height="200px"><br>
						
						<span>{{$cs->c_title}}</span>
						@foreach ($instructors as $i)
						@if($cs->c_instructor_fk == $i->id)
						<br>{{$i->ins_name}}
						@endif
						@endforeach
						<br>

		<?php $n=0;
		$tot=0; ?>
						@foreach ($ratings as $r)
						@if($cs->id == $r->c_id)
						<?php $n++; ?>
						<?php $tot+=$r->r_rating; ?>
						@endif
						@endforeach
						<?php if($n==0){
						$n=1;}
						 $avg=$tot/$n;?>
						<span>Rating: {{$avg}}</span><br>
						<span>Price: {{$cs->c_price}}tk</span></center></table></a></td><td width="50px"></td>
						<?php $x++; ?>
		@endif
						@endif
						@endforeach
</tr></table>
		
		</tr>
			@endforeach
		
	</table>
	
	</center>

      @endsection
</body>
</html>
