<!DOCTYPE html>
<html lang="en">
<head>
      <title>Change Password</title>
      
      <link rel="icon" href="https://cutt.ly/jP1GPRj" type="image/icon type">
      <style>
            table.border {
                  border: 5px solid grey;
                  border-collapse: collapse;};
            /* table, th, td {
                  border: 1px solid black;
                  border-collapse: collapse;}; */
      </style>
</head>
<body>
      
@extends('layouts.app1')
@section('content')

      <center><table class="border"><td width="400px"><br><center>
      <img src="{{asset('storage/coursethumbnail/'.$userlogins->u_pro_pic)}}" width="150px" publicheight="150px" alt="LOGO">
      <h1>{{$userlogins->u_name}}</h1>
      </center>

      <table>
            <tr><td width="215px"></td><td width="185px"></td></tr>

            <tr><td ><form action="profile"><input type="submit" value="View Profile" style= "height: 50px; font-size: 20px; background-color:rgb(158, 255, 163);"></form><br>
            
            <br></td>
            <td style="text-align:right"><form action=""><input type="submit" value="Edit Profile" style= "height: 50px; font-size: 20px;  background-color:rgb(144, 160, 255);"></form><br><br></td></tr>

            <!-- <form action="{{route('st_edit.submit')}}" method="post"> -->
            <form action="{{route('st_changepass.submit')}}" method="post">
            
            {{@csrf_field()}}

            <tr><td style="font-size: 22px;">Old Password:</td>
            <td style="font-size: 18px;"> <input style="height:25px; width:180px; font-size: 18px;" type="text" name="old_pass">
            <br>@error('old_pass')
            <span>{{$message}}</span>
            @enderror
            </td>
      </tr>

            <tr><td style="font-size: 22px;">New Password:</td>
            <td style="font-size: 18px;"> <input style="height:25px; width:180px; font-size: 18px;" type="password" name="new_pass">
            <br>@error('new_pass')
            <span>{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px;">Confirm Password:</td>
            <td style="font-size: 18px;"> <input style="height:25px; width:180px; font-size: 18px;" type="password" name="cnew_pass">
            <br>@error('cnew_pass')
            <span>{{$message}}</span>
            @enderror
            </td></tr> 

            <tr><td colspan="2">@if(Session::has('message'))
            <h3 style="color:red;"><center>{{ Session::get('message') }}</center></h3>
            @endif</td></tr>

            
            <tr><td colspan="2"><br><center><input type="submit" value="Change Password" style= "width: 200px; height: 50px; font-size: 20px; background-color:rgb(255, 158, 158);"></center></td></tr>
      </form></table>

      </td></table></center>
      @endsection
</body>
</html>
