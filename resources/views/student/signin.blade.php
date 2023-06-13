<head><title>Sign In</title></head>
@extends('includes.headlogreg')
@section('content')
<br><br><br><br><br><br><br><br>
<form action="{{route('signin.submit')}}" method="post">
      {{@csrf_field()}}
      <center>
<table>
      <tr><td style="font-size: 22px; text-align: right;">User Name:</td><td width="30px"></td>
            <td style="font-size: 18px;"> <input type="text" name="uname" value="{{old('uname')}}" placeholder="Enter your username" style="height:25px; width:265px; font-size: 18px;">
            <br>@error('uname')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <tr><td style="font-size: 22px; text-align: right;">Password:</td><td></td>
            <td style="font-size: 18px;"> <input style="height:25px; width:265px; font-size: 18px;" placeholder="Enter your password" type="password" name="pass" value="{{old('pass')}}">
            <br>@error('pass')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>
            </table>
            @if(Session::has('msg'))
            <p>{{ Session::flash('msg') }}</p>
            @endif
            
            <br><h2>Don't have account?<a href="{{route('stsignup')}}"> Sign up here</a></h2>
            </center>

      <center>
      <input type="submit" Value="Sign In" style="height:35px; width:100px; font-size: 18px;" ><br></center>
</form><br><br><br>
@endsection