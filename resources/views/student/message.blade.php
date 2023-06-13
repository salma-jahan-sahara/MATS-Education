<!DOCTYPE html>
<html lang="en">
<head>
      <title>Message</title>
        
    
    
      <style>
      /* table, th, td {
                  border: 1px solid black;
                  border-collapse: collapse;}; */
                  </style>
</head>
<body>
      @if(Session::get('type')=="admin")
            @include('layouts.head')
      @elseif(Session::get('type')=="instructor")
      <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/style.css">
      </head>
      
      @include('includes.instructorheader')
            <!-- @ include('layouts.instructorlayout') -->
      @else
            @include('includes.head')
      @endif

      <table  >
            <tr><td width="380px"><br></td><td rowspan="3" width="7px" style="background-color:grey; position: fixed; height:550px;"></td><tr>

            <tr><td height="50px" style="position: fixed;">
            @include('student.messagesearch')
            </td><td rowspan="2" height="450px" style="vertical-align: top; padding-left:30px"> 
            
      @foreach($userlogins as $ul)
            @if($ul->id==Session::get('other'))
            <center>
                  @if($ul->u_type=="student")
                  <img src="{{asset('storage/student/'.$ul->u_pro_pic)}}" height="100px" width="100px" alt="">
                  @elseif($ul->u_type=="instructor")
                  <img src="{{asset('storage/instructor/'.$ul->u_pro_pic)}}" height="100px" width="100px" alt="">
                  @else
                  <img src="{{asset('storage/mats.png')}}" height="100px" width="100px" alt="">
                  @endif
                  <br>
                  <h3>{{$ul->u_name}}, {{$ul->u_type}}</h3></center>
            @endif
      @endforeach
      
      
            @include('student.messageshow')
            <br><br>
            <table><tr id="bottom"></tr></table>
             </td></tr>
            <tr><td  height="450px" rowspan="2" style="vertical-align: top; position: fixed;"><br><br><br>
            @include('student.messagelist')
            
            </td></tr>
            
            <table style="position: fixed;
            bottom: 0;
            right: 0;
            width: 860px;
            background-color: white;"><tr>
        <td>@include('student.messagein')</td></tr></table>
            
      </table>
</body>
</html>