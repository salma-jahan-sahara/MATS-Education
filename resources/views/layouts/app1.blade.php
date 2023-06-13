<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://cutt.ly/jP1GPRj" type="image/icon type">
</head>
<body>
      

      @include('includes.head')
      
      @yield('content')
      
      <br><br><table bgcolor="silver" height="150px" width="1265px"><tr>

      <td width="120px"></td>
      <td width="150px"><a href="{{route('home')}}"><img src="{{asset('header/mats.png')}}" alt="logo" height="100px"></a></td><td width="120px"></td>
      <td width="350px">
            <h3><a href="">About Us </a>
            <br><a href="">Contact us </a>
            <br><a href="">Privacy Policy </a>
            <br><a href="{{route('instructor.instructor_reg')}}">Join as Instructor </a>
            <br><a href="">Career with Us </a></h3> </td>
      <td><h1 style="display:inline">Connect With Us</h1> <br>
      <h3 style="display:inline">Mobile: </h3>01987654321 <br>
      <h3 style="display:inline">Address: </h3>AIUB, Kuratoli, Dhaka-1229<br>
      <h3 style="display:inline">Email: </h3>hello@mats.edu</td>

      </tr></table>
</body>
</html>