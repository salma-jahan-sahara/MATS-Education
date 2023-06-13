<!DOCTYPE html>
<html lang="en">
<head>
      <title>{{$courses->c_title}}</title>
      <style>
            a {text-decoration: none;}
            /* table, th, td {
            border: 1px solid black;
            border-collapse: collapse;}; */
      </style>
</head>
<body>
      
@extends('layouts.app1')
@section('content')
<br><br>

@if($access=="nai")

Please buy the course first
      

@else
<table><!-- style="height: 400px; -->
            <tr><td style="width: 320px;"><br></td><td style="width: 10px; background-color: grey;" rowspan="2"></td><td style="width: 910px;"></td></tr>
            <!-- <tr><td></td><td></td></tr> -->
            <tr>
                  <td><h2 style="display:inline;"><a href="/forum/{{$courses->id}}"> Forum: {{$courses->c_title}}</a></h2>

                  @foreach($topics as $ts)
                        <br><a href="/course/{{$courses->id}}/{{$ts->id}}">&emsp;{{$ts->t_title}}</a>
                  @endforeach
      <br><a href="/certgen/{{$courses->id}}">&emsp;✨✨Get Certificate✨✨</a></td>
                  <td>
            @if($pctid!=NULL)
                  @foreach($topics as $t)
                        @if($t->id==$pctid)
                        <h1>{{$t->t_title}}</h1>
                        @endif
                  @endforeach
                  
                  <!-- <video width="900" controls>
                        <source src="mov_bbb.mp4" type="video/mp4">     
                  </video> -->

                  <!-- <video preload="" tabindex="-1" disablepictureinpicture="" style="" src="blob:https://www.youtube.com/watch?v=gcelIoIFYlE"></video> -->

                  <!-- <iframe src="https://youtu.be/gcelIoIFYlE" frameborder="0" allow="autoplay; fullscreen" allowfullscreen width="900px" ></iframe> -->
                        
      <video width="900px" controls>
      <source src="{{URL::asset("/storage/lecturevideo/$ts->t_video")}}" type="video/mp4">
      Your browser does not support the video tag.
      </video>

                        <!-- <iframe width="900" height="500px" src="{{$ts->t_video}}" title="" frameborder="0" allow="autoplay;" allowfullscreen></iframe> -->

                  <!-- <video width="900" controls src="https://youtu.be/gcelIoIFYlE >
                  </video> -->
                  <br>

                  @foreach($topics as $t)
                        @if($t->id==$pctid)
                        <h3 style="display: inline;">{{$t->t_title}}: </h3>{{$t->t_material}} <br> <br><br><br>
                        @endif
                  @endforeach
<form action=""><table>
                  @foreach($quizzes as $q)
                  <tr><td colspan="2"><br><li><h3 style="display:inline;">{{$q->q_ques}}</h3></li></td></tr>
                        
                        
                              <tr><td width="350px"></td><td width="350px"></td></tr>
                              <tr>
                                    <td><input type="radio" name="opt1" value="{{$q->q_option1}}">{{$q->q_option1}}</td>
                                    <td><input type="radio" name="opt2" value="{{$q->q_option1}}">{{$q->q_option2}}</td>
                              </tr>
                              <tr>
                                    <td><input type="radio" name="opt3" value="{{$q->q_option1}}">{{$q->q_option3}}</td>
                                    <td><input type="radio" name="opt4" value="{{$q->q_option1}}">{{$q->q_option4}}</td>
                              </tr>
                        

                  @endforeach
                  <tr><td colspan="2"><center><br><input type="submit"></center></td></tr>
                  </table></form><br><br><br>









                  
            @else
            <table width="500px">

		<tr>
    		<td>
				<img src="{{asset('storage/coursethumbnail/'.$courses->c_thumbnail)}}" width="100%" height="200px"><br>
					<h2>{{$courses->c_title}}</h2>
					<p>{{$courses->c_description}}</p>
					
					<h2>Created by <a href="#">
						@foreach($instructors as $i)
	@if($courses->c_instructor_fk==$i->id)
{{$i->ins_name}}
@endif
						@endforeach
					</a></h2>
					<br>
					<?php $n=0;
		$tot=0; ?>
						@foreach ($ratings as $r)
						@if($courses->id == $r->c_id)
						<?php $n++; 
						 $tot+=$r->r_rating; ?>
						@endif
						@endforeach
						<?php if($n==0){
						$n=1;}
						 $avg=$tot/$n;?>
						<span>Rating: {{$avg}}</span><br>

                    <br><br><br>
			</td>
		</tr> 
		
	</table>
            @endif           

                  </td>
            </tr>
      </table>
@endif

  @endsection    
</body>
</html>
