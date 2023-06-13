<!DOCTYPE html>
<html lang="en">
<head>
      <title>Home</title>
      
      <link rel="icon" href="https://cutt.ly/jP1GPRj" type="image/icon type">
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



<!-- /////////////////////// -->
<table>
		
      <?php $x=1; ?>
      @foreach($categorieshead as $ctg)
                  @if($ctg->id==$ct_id)
                        <h2>{{$ctg->cat_name}}</h2>
                  @endif
      @endforeach
      
      <hr style="height:2px;border-width:0;color:gray;background-color:gray">
      <table>
            <tr><td width="50px" height="100px"></td>
            @foreach($course as $cs)
            
                  @if ($x<=4)
                        <td style="width: 200px"><a href="/courses/details/{{$cs->id}}"><table><center>
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
                        <span>Price: {{$cs->c_price}}tk</span></center></table></a></td><td width="50px" height="100px"></td>
                        <?php $x++; ?>

                  @else
                  
                        </tr>
                        <tr><td><br><br></td></tr>
                        
                        <tr><td width="50px" height="100px"></td>
                        <?php $x=1;?>
                        <td style="width: 200px"><a href="courses/details/{{$cs->id}}"><table><center>
                        <img src="" width="200px" height="200px"><br>

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
            
            @endforeach
            </tr>
      </table>

      </tr>

</table>

</center>

      @endsection
</body>
</html>
