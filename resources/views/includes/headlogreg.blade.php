<!DOCTYPE html>
<html lang="en">
<head>   
      <link rel="icon" href="https://cutt.ly/jP1GPRj" type="image/icon type">
      <style>
            a {text-decoration: none;}
            td.hvr:hover {
                  background-color: rgb(228, 228, 228);
                  transform: scale(1.04);}

            /* table, th, td {
                  border: 1px solid black;
                  border-collapse: collapse;}; */

                  .dropdown {
      float: left;
      overflow: hidden;
    }
    
    /* Dropdown button */
    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: rgb(0, 0, 0);
      /* padding: 14px 16px; */
      background-color: inherit;
      font-family: inherit; /* Important for vertical align on mobile phones */
      margin: 0; /* Important for vertical align on mobile phones */
    }
    
    /* Add a red background color to navbar links on hover */
    .navbar a:hover, .dropdown:hover .dropbtn {
                  background-color: rgb(228, 228, 228);
                  transform: scale(1.04);}
    
    /* Dropdown content (hidden by default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 180px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    /* Links inside the dropdown */
    .dropdown-content a  {
      float: none;
      color: black;
      /* padding: 12px 16px; */
      text-decoration: none;
      display: block;
      text-align: left;
    }
    
    /* Add a grey background color to dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    
    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }

    table.maintable{
                  z-index: 3;  
                  position:fixed;
                  top: 0;
                  right: 0px;
            }


            
    .dropdown123 {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
      }

      .dropdown123 li {
            padding: 8px;
            position: relative;
      }

      .dropdown123 ul {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            display: none;
            left: 0;
            position: absolute;
            top: 100%;
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 200px;
      }

  
      .dropdown123 ul ul {
            left: 100%;
            position: absolute;
            top: 0;
      }
      
      .dropdown123 li:hover {
            background-color: rgb(228, 228, 228);
            
      }

      .dropdown123 li:hover > ul {
            display: block;
      }
  
  

      </style>
</head>
<body>
      
<table bgcolor="silver" class="maintable" ><tr height="50px">
            <td class="hvr" width="150px"><a href="{{route('home')}}">
                  <img src="{{asset('header/mats.png')}}" alt="logo headers" height="50px"></a></td>
                  <td class="hvr" width="110px"><a href="{{route('certificate')}}">Certificates</a></td>
            <td class="hvr" width="130px"><a href="">

            <ul class="dropdown123">
    
    <li>
        <div>Categories</div>
        <ul>@foreach($categorieshead as $c)
            <li>
                <div><a href="/category/{{$c->id}}">{{$c->cat_name}}</a></div>
                <!-- Second level sub dropdown123 -->
                  <ul>
                  @foreach($courseshead as $cs)
                    @if($c->id==$cs->c_category_fk )
                        <li><a href="/courses/details/{{$cs->id}}">{{$cs->c_title}}</a></li>
                    @endif
                  @endforeach
                  </ul>
            </li>
        @endforeach</ul>
    </li>
</ul>

            </a></td>
            <td width="550px">
                  <form action="" method="get">
                        <input style= "width:300px; height:36px;" type="text" name="search" placeholder="Search here by Course, Category or Instructor...">
                        <input style= "height:36px;" type="submit" value="🔍 Search">
                  </form>
            </td>
            <td width="300"></td>
      </td></tr></table>

      @yield('content')

      <br><br><table bgcolor="silver" height="150px" width="1245px"><tr>

      <td width="120px"></td>
      <td width="150px"><a href="{{route('home')}}"><img src="{{asset('header/mats.png')}}" alt="logo" height="100px"></a></td><td width="120px"></td>
      <td width="350px">
            <h3><a href="">About Us </a>
            <br><a href="">Contact us </a>
            <br><a href="">Privacy Policy </a>
            <br><a href="">Join as Instructor </a>
            <br><a href="">Career with Us </a></h3> </td>
      <td><h1 style="display:inline">Connect With Us</h1> <br>
      <h3 style="display:inline">Mobile: </h3>01987654321 <br>
      <h3 style="display:inline">Address: </h3>AIUB, Kuratoli, Dhaka-1229<br>
      <h3 style="display:inline">Email: </h3>hello@mats.edu</td>

      </tr></table>

      
</body>
</html>


