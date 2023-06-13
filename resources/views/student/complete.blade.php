<!DOCTYPE html>
<html lang="en">
<head>
      <title>Purchased Courses</title>
      
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

      <h2>Purchased Courses</h2><!-- <br>{ {$ccs->c_id}} -->
      <hr style="height:2px;border-width:0;color:gray;background-color:gray"><table><tr>
      @foreach($en_courses as $enc)
      
      @if ($enc->st_id==Session::get('id'))

            @foreach($courses as $cs)
            @if($enc->c_id==$cs->id)
            @if($enc->tot_topic==$enc->complete_topic)
            @if ($x<=4)
                  <td style="width: 200px"><a href="course/{{$cs->id}}"><table><center>
                        <img src="" width="200px" height="200px"><br>
                        
                        <span>{{$cs->c_title}}</span>
                        
                        @foreach ($instructors as $i)
                              @if($cs->c_instructor_fk == $i->id)
                              <br>{{$i->ins_name}}
                              
                              @endif
                        @endforeach
                        <br>			</center></table></a></td><td width="50px"></td>
                        <?php $x++; ?>

            @else
            </tr><tr><td><br><br></td></tr><tr>
            <?php $x=2;?>
            <td style="width: 200px"><a href="course/{{$cs->id}}"><table><center>
                        <img src="" width="200px" height="200px"><br>
                        
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
                              @endif
                              @endforeach

                        @endif
      @endforeach
	
      </tr></table>
@endif


<!-- /////////////////////// -->

	
	</center>

      @endsection
</body>
</html>
