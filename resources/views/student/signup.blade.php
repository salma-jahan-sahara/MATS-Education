<!DOCTYPE html>
<html lang="en">
<head>
      <title>Sign Up</title>
      
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
@extends('includes.headlogreg')
@section('content')
<br><br><br>

      
<center>
      <table>
           
            <!-- <form action="{{route('st_edit.submit')}}" method="post"> -->
            <form action="{{route('stsignupsubmit')}}" method="post" enctype="multipart/form-data">
            
            {{@csrf_field()}}

            

            <tr><td style="font-size: 22px; text-align: right;">Name:</td><td width="30px"></td>
            <td style="font-size: 18px;"> <input type="text" name="st_name" value="{{old('st_name')}}" placeholder="Enter your academic name" style="height:25px; width:265px; font-size: 18px;">
            <br>@error('st_name')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px; text-align: right;">Uname:</td><td></td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" placeholder="Enter a unique username" type="text" name="st_username" value="{{old('st_username')}}">
            <br>@error('st_username')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>
            
            <tr><td style="font-size: 22px; text-align: right;"> Profile Picture <p style="font-size: 12px; display:inline;">(optional) </p>:</td><td></td>
            <td style="font-size: 18px;"> <input style="height:30px; width:265px; font-size: 18px;"type="file" name="pro_pic" value="{{old('pro_pic')}}">
            <br>@error('pro_pic')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px; text-align: right;">Password:</td><td></td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" placeholder="Enter a strong password" type="password" name="st_password" value="{{old('st_password')}}">
            <br>@error('st_password')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px; text-align: right;"">Confirm Password:</td><td></td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" placeholder="Re-type password to confirm" type="password" name="st_confpassword" value="{{old('st_confpassword')}}">
            <br>@error('st_confpassword')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px; text-align: right;">Phone:</td><td></td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" placeholder="Enter 11 digit Phone Number" type="text" name="st_phone" value="{{old('st_phone')}}">
            <br>@error('st_phone')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px; text-align: right;">Email: </td><td></td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" placeholder="Enter a valid email address" type="text" name="st_email" value="{{old('st_email')}}">
            <br>@error('st_email')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px; text-align: right; vertical-align: bottom;">Address: </td><td></td>
            <td style="font-size: 18px;"> <textarea name="sr_address" placeholder="Enter your address (optional)" style="height:100px; width:267px; font-size: 18px;resize: none;" 
            value="{{old('sr_address')}}"></textarea>
            
            <br>@error('sr_address')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td colspan="3"><center>
                  <h2>Already have an account?<a href="{{route('signin')}}"> Sign in here</a></h2>
            &emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" value="Submit" style= "width: 200px; height: 50px; font-size: 20px; background-color:rgb(144, 160, 255);"></center></td></tr>
      </form></table>

      </td></table></center>
      @endsection
</body>
</html>
