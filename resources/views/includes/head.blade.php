<!DOCTYPE html>
<html lang="en">
<head>   
      <link rel="icon" href="https://cutt.ly/jP1GPRj" type="image/icon type">
      <style>
            a {text-decoration: none;}
            table.maintable{
                  z-index: 3;  
                  position:fixed;
                  top: 0;
                  right: 0;
            }
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
                  <img src="{{asset('header/mats.png')}}" alt="logo headers" style="margin-left: 10px;" height="50px"></a></td>
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
            <td class="hvr" width="150px"><a href="{{route('public.instructorlist')}}">Our Instructors</a></td> {{--  ovy --}}
            <td width="620px">
                  <form action="{{route('search')}}" method="post">
                        {{@csrf_field()}}
                        <input style= "width:300px; height:30px;" type="text" name="search" placeholder="Search here by Course, Category or Instructor..."  autocomplete="off">
                        <input style= "height:36px;" type="submit" value="🔍 Search">
                  </form>
            </td>

            @if(Session::get('name'))
            <td width="100"></td><td width="200px"  style="float: right;" class="hvr" >
            
      
            <div class="dropdown">

                  <button class="dropbtn"> 
                  <table><td class="hvr" height="30px" ><table><td>
                    
            <a href=""><img src="{{asset('storage/student/'.Session::get('pro_pic'))}}" height="30px" alt="LOGO"><br></td><td>{{Session::get('name')}}</td></a></table></td></table>        
                  </button>

                  <div class="dropdown-content">

                  <a href="{{route('stprofile')}}"><table><td width="160px" height="30px">My Profile</td></table></a>
                  <a href="{{route('stedit')}}"><table><td width="160px" height="30px">Edit Profile</td></table></a>
                  <a href="{{route('purchase')}}"><table><td width="160px" height="30px">Purchased Course</td></table></a>
                  <a href="{{route('complete')}}http://localhost/project/index.php"><table><td width="160px" height="30px">Completed Courses</td></table></a>
                  <a href="/meslistcon/1"><table><td width="160px" height="30px">Contact With Admin</td></table></a>
                  <a href="{{route('message')}}#b"><table><td width="160px" height="30px">Message</td></table></a>
                  <a href="{{Route('signout')}}"><table><td width="160px" height="30px">Sign Out</td></table></a>
                  </div>
            </div>

            
      </td>
      </td></tr></table>
      


     



     

    @else
      
   
         
            <td class="hvr" width="80px"><a href="{{route('signin')}}">Sign In</a></td>
            <td class="hvr" width="80px"><a href="{{route('stsignup')}}">Sign up</a></td>
      </tr></table>
      <br>
      <br>
      @endif
      <br><br>
     

      
</body>
</html>




