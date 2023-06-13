<!DOCTYPE html>
<html lang="en">
<head>
      <title>Student Profile</title>
      <link rel="icon" href="https://cutt.ly/jP1GPRj" type="image/icon type">
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

            <tr><td colspan="2"><form action="edit" method="get"><center><input type="submit" value="Edit Profile" style= "height: 50px; width: 110px; font-size: 20px; background-color:rgb(158, 255, 163);"></center></form><br><br><br><br></td></tr>

            <tr><td style="font-size: 22px;">Uname:</td>
            <td style="font-size: 18px;"> {{$students->st_username}}</td></tr>

            <tr><td style="font-size: 22px;">Phone:</td>
            <td style="font-size: 18px;">{{$students->st_phone}}</td></tr>

            <tr><td style="font-size: 22px;">Email: </td>
            <td style="font-size: 18px;">{{$students->st_email}}</td></tr>

            <tr><td style="font-size: 22px;">Address: </td>
            <td style="font-size: 18px;">{{$students->st_address}}</td></tr>
      </table>

      </td></table></center>
      @endsection
</body>
</html>
