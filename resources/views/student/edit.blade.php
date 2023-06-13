<!DOCTYPE html>
<html lang="en">
<head>
      <title>Edit Profile</title>
      
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

<br><br><br>
      <center><table class="border"><td width="400px"><br><center>
      <img src="{{asset('storage/student/'.$ul->u_pro_pic)}}" width="150px" height="150px" alt="LOGO"><h1>{{$students->st_name}}</h1>
      </center>

      <table>
            <tr><td width="110px"></td><td width="290px"></td></tr>

            <tr><td ><form action="profile"><input type="submit" value="View Profile" style= "height: 50px; font-size: 20px; background-color:rgb(158, 255, 163);"></form><br>
            
            <br></td>
            <td style="text-align:right"><form action="changepass"><input type="submit" value="Change Password" style= "height: 50px; font-size: 20px;  background-color:rgb(255, 158, 158);;"></form><br><br></td></tr>

            <!-- <form action="{{route('st_edit.submit')}}" method="post"> -->
            <form action="{{route('st_edit.submit')}}" method="post">
            
            {{@csrf_field()}}

            <tr><td style="font-size: 22px;">Name:</td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" type="text" name="st_name" value="{{$students->st_name}}">
            <br>@error('st_name')
            <span>{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px;">Phone:</td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" type="text" name="st_phone" value="{{$students->st_phone}}">
            <br>@error('st_phone')
            <span>{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px;">Email: </td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" type="text" name="st_email" value="{{$students->st_email}}">
            <br>@error('st_email')
            <span>{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px;">Address: </td>
            <td style="font-size: 18px;"> <input style="height:70px;  width:265px; font-size: 18px;" type="text" name="st_address" value="{{$students->st_address}}">
            <br>@error('st_address')
            <span>{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td colspan="2"><br><center><input type="submit" value="Submit" style= "width: 200px; height: 50px; font-size: 20px; background-color:rgb(144, 160, 255);"></center></td></tr>
      </form></table>

      </td></table></center>
      @endsection
</body>
</html>
