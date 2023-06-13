<!DOCTYPE html>
<html lang="en">
<head>
      <title>Forum</title>
      <style>
            #rcorners {
      border-radius: 300px;
      background: none;
      padding: 10px;  
      height: 30px;
      width:30px;
    }
    td.brdr {
                  border: 8px solid black;
                  border-collapse: collapse;};
                  
      </style>
</head>
<body>
      @extends('layouts.app1')
@section('content')
<center><table><td class="brdr">

<table>
      <tr ><td style="width:700px;">
      <center><h2>Forum: <a href="{{route('course', ['c_id'=>$cs->id])}}"> {{$cs->c_title}}</a>
            
      </h2></center>
      <form action="{{route('forum', ['c_id'=>$cs->id])}}" method="post" enctype="multipart/form-data">
      {{@csrf_field()}}
      <textarea name="f_question" placeholder="Ask any question about course: {{$cs->c_title}}" style="height:100px; width:697px; font-size: 18px;resize: none;"></textarea><br>
      <!-- assume course #4 -->
      <input style="height:35px; font-size: 18px;" type="file" name="forum_material">
      <input type="hidden" name="option" value="ask">
      <input type="submit" style="height:35px; width:100px; float: right; font-size: 18px;">

      </form>
      </td></tr>
      
      
      @foreach($forums as $fs)
      <tr><td style="background-color: grey; height: 5px;"></td></tr>
      <tr><td>
            @foreach($ul as $u)
                  @if($u->id==$fs->st_id)
                  <table><tr>
                  @if ($u->u_type=="student")
                  <td> <img src="{{asset('storage/student/')}}" id="rcorners" alt=""></td>
                  @else 
                  <td> <img src="{{asset('storage/instructor/')}}" id="rcorners" alt=""></td>
                  @endif
                  
                  <td><p style="font-size: 18px; display:inline;">{{$u->u_name}} </p><p style="font-size: 10px; line-height:0;">{{$fs->f_datetime}}</p></td></tr></table>
                  @endif
            @endforeach
            <h3 style=" display:inline;">{{$fs->f_question}}</h3>
            <center><table><tr><td style="width:600px">
            <form action="{{route('forum', ['c_id'=>$cs->id])}}" method="post">
            {{@csrf_field()}}
                  <input type="text" placeholder="Reply here" name="fc_comment"  style="width:450px; height:30px;">&ensp;
                  <input type="file" id="files" style="display:none;">
                  <label for="files"><img src="https://cutt.ly/OAhMP4z" height="30px" style="vertical-align: middle;" alt="">&ensp;</label>
                  <input type="hidden" value="{{$fs->id}}" name="f_id">
                  <input type="hidden" name="option" value="com">

                  <input type="submit" style=" width:80px;height:35px; float:right;">

                  
                  
                  
            </form>
            </td></tr>
            <tr><td>
                  
            @foreach($fcs as $fc)
                  @if($fc->fc_forum_fk==$fs->id)
                        @foreach($ul as $u)
                              @if($u->id==$fc->fc_uid)

                        
                  <table><tr><td>
                      
                  @if ($u->u_type=="student")
                  <img src="{{asset('storage/student/'.$u->u_pro_pic)}}" id="rcorners" alt=""></td><td><p style="font-size: 18px; display:inline;">
                  @else
                  <img src="{{asset('storage/instructor/'.$u->u_pro_pic)}}" id="rcorners" alt=""></td><td><p style="font-size: 18px; display:inline;">
                  @endif

                  @if($u->u_type=="instructor")
                        <p style="color:red; display:inline;">{{$u->u_name}} </p>
                  @else
                  <p style="display:inline;">{{$u->u_name}} </p>
                  @endif
                  
            </p><p style="font-size: 10px; line-height:0;">{{$fc->fc_datetime}}</p></td></tr></table>
                  &emsp;&emsp;{{$fc->fc_comment}}
                        <br>
                              @endif
                        @endforeach
                  @endif
            @endforeach
            </td></tr>
      
      </table></center>
            
      </td></tr>
      @endforeach
      
</table></td></table>
</center>  
@endsection   
</body>
</html>


