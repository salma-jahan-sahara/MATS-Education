@extends('layouts.publiclayout')
@section('content')
    <h1>Instructor {{$instructor->id}} Details</h1>

    <br><br>
    <h3>Teacher's Details</h3>
       
        <img id="dpicon" src="{{asset('storage/instructor/'.$instructor->ins_dp)}}"  style="width:150px; height:150px; border-radius:50%; "  alt="Image">
      
    <h4> Name: {{$instructor->ins_name}}</h4>
    <h4> Degree: {{$instructor->ins_degree}}</h4> 
    <h4> Bio: {{$instructor->ins_bio}}</h4> 
    <h4> Category: {{$instructor->instructorcategory->cat_name}}</h4> 
    <h4> Phone: {{$instructor->ins_phone}}</h4> 
    <h4> Email: {{$instructor->ins_email}}</h4> 
    <h4> Experience: {{$instructor->ins_exp}}</h4> 
     <h4>Courses by Instructor: </h4> 

     @if(count($instructor->coursesbyinstructor)>0)
     <table class="table  table-hover">
        <tr>
            <th>Image </th>
      
            <th>Course Title</th>
            <th>Course Description</th>
            <th>Course Price</th>
            <th>Enrollments count</th>
            <th>Rating</th>
            <th>Course Status</th>
      
        </tr>
      
        @foreach($instructor->coursesbyinstructor as $c)
      
            <tr class="clickable  " style="cursor:pointer; "  onclick="window.location='#'">
      
              <td >
                 
                  <img  src="{{asset('storage/coursethumbnail/'.$c->c_thumbnail)}}"  style="width:100px; height:100px; "  alt="Image">
                  
              </td>
      
                <td> {{$c->c_title}}</td>
                <td> {{$c->c_description}}</td>
                <td> {{$c->c_price}}</td>
                <td>
                  {{count($c->studentsincourse)}}
               </td>
               <td>
                   @php
                      $rat=0;
                      $totrat=count($c->studentsincourse);
                  @endphp
                  @foreach($c->ratingsofcourse as $cr)
                      @php
                          $rat=$rat + ($cr->r_rating)  ;
                      @endphp
                      
                  @endforeach
                  
                  @if(count($c->ratingsofcourse) == 0)
                  Not Rated
                  @else
                  {{$rat/$totrat}} /5  ({{$totrat}})</h4>
                  @endif
                  
               </td>
      
               <td> {{$c->c_status}}</td>
            </tr>
        @endforeach
      </table>

      @else
    <h5><span class="label label-warning" >No data found</span></h5>
    @endif
@endsection