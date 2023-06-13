<!-- <!DOCTYPE html>
<html lang="en">
<head>
      <title>Student Header</title>      
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
  

      </style>
</head>
<body>
<table bgcolor="silver"><tr height="50px">
            <td class="hvr" width="150px"><a href=""><img src="https://scontent.fdac13-1.fna.fbcdn.net/v/t1.15752-9/273060570_503948087800029_3713410203044222635_n.png?_nc_cat=109&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEbSNuyMM8wu79Lmmg_SRj9ACfagN3J1FkAJ9qA3cnUWW_3ZSGIAtVrhlAFsehce153C3_F91cn3fmichHkyS2O&_nc_ohc=-R_QXiHya24AX8HOC5u&tn=brwslr_m5-noJKqy&_nc_ht=scontent.fdac13-1.fna&oh=03_AVKbgd6BiQ56lP7Boank_KH3ku2djOluJobTcdf0Bs_JsA&oe=623A75B3" alt="logo" height="50px"></a></td>
            <td class="hvr" width="110px"><a href="">Contact Us</a></td>
            <td class="hvr" width="130px"><a href="">

            <div class="dropdown">

                  <button class="dropbtn">        
                  <table width="130px"><tr class="hvr"><td  width="60px"><a href="">Categories</a></td></tr></table>        
                  </button>

                  <div class="dropdown-content">

                  @foreach($categories as $c)
                  <a href=""><table><td width="160px" height="30px">{{$c->cat_name}}</td></table></a>
                  @endforeach
                        
                  
                  </div>
            </div>


            </a></td>
            <td width="550px">
                  <form action="" method="get">
                        <input style= "width:430px; height:30px;" type="text" name="search" placeholder="Search here by Course, Category or Instructor...">
                        <input style= "height:36px;" type="submit" value="🔍 Search">
                  </form>
            </td>
            <td width="300"></td>
      </td></tr></table>
      <br>
      <br>
      <br>
      <br>
      <br>


      <table bgcolor="silver"><tr height="50px">
            <td class="hvr" width="150px"><a href=""><img src="https://scontent.fdac13-1.fna.fbcdn.net/v/t1.15752-9/273060570_503948087800029_3713410203044222635_n.png?_nc_cat=109&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEbSNuyMM8wu79Lmmg_SRj9ACfagN3J1FkAJ9qA3cnUWW_3ZSGIAtVrhlAFsehce153C3_F91cn3fmichHkyS2O&_nc_ohc=-R_QXiHya24AX8HOC5u&tn=brwslr_m5-noJKqy&_nc_ht=scontent.fdac13-1.fna&oh=03_AVKbgd6BiQ56lP7Boank_KH3ku2djOluJobTcdf0Bs_JsA&oe=623A75B3" alt="logo" height="50px"></a></td>
            <td class="hvr" width="110px"><a href="">Contact Us</a></td>
            <td class="hvr" width="130px"><a href="">

            <div class="dropdown">

                  <button class="dropbtn">        
                  <table width="130px"><tr class="hvr"><td  width="60px"><a href="">Categories</a></td></tr></table>        
                  </button>

                  <div class="dropdown-content">

                  @foreach($categories as $c)
                  <a href=""><table><td width="160px" height="30px">{{$c->cat_name}}</td></table></a>
                  @endforeach
                        
                  
                  </div>
            </div>


            </a></td>
            <td width="550px">
                  <form action="" method="get">
                        <input style= "width:430px; height:30px;" type="text" name="search" placeholder="Search here by Course, Category or Instructor...">
                        <input style= "height:36px;" type="submit" value="🔍 Search">
                  </form>
            </td>
            <td width="100"></td><td width="200px"  style="float: right;" class="hvr" >
            
      
            <div class="dropdown">

                  <button class="dropbtn"> 
                  <table><td class="hvr" height="30px" ><table><td>
            <a href=""><img src="https://png.pngitem.com/pimgs/s/627-6275734_profile-icon-contacts-hd-png-download.png" height="30px" alt="LOGO"></td><td>Student's Name</td></a></table></td></table>        
                  </button>

                  <div class="dropdown-content">

                  <a href=""><table><td width="160px" height="30px">My Profile</td></table></a>
                  <a href=""><table><td width="160px" height="30px">Edit Profile</td></table></a>
                  <a href=""><table><td width="160px" height="30px">Purchased Course</td></table></a>
                  <a href=""><table><td width="160px" height="30px">Completed Courses</td></table></a>
                  <a href=""><table><td width="160px" height="30px">Certificates</td></table></a>
                  <a href=""><table><td width="160px" height="30px">Wishlist</td></table></a>
                  <a href=""><table><td width="160px" height="30px">Contact With Admin</td></table></a>
                  <a href=""><table><td width="160px" height="30px">Log Out</td></table></a>
                  </div>
            </div>

            
      </td>
      </td></tr></table>
      <br>
      <br>
      <br>
      <br>
      <br>


     



      <!-- @foreach($categories as $c)
            <tr>
            <td>{{$c->id}}. </td>
                  
                  <td>{{$c->cat_name}}</td>
            </tr>
            @endforeach -->



      
      <br>
      <br>
      <table bgcolor="silver"><tr height="50px">
            <td class="hvr" width="150px"><a href=""><img src="https://scontent.fdac13-1.fna.fbcdn.net/v/t1.15752-9/273060570_503948087800029_3713410203044222635_n.png?_nc_cat=109&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEbSNuyMM8wu79Lmmg_SRj9ACfagN3J1FkAJ9qA3cnUWW_3ZSGIAtVrhlAFsehce153C3_F91cn3fmichHkyS2O&_nc_ohc=-R_QXiHya24AX8HOC5u&tn=brwslr_m5-noJKqy&_nc_ht=scontent.fdac13-1.fna&oh=03_AVKbgd6BiQ56lP7Boank_KH3ku2djOluJobTcdf0Bs_JsA&oe=623A75B3" alt="logo" height="50px"></a></td>
            <td class="hvr" width="110px"><a href="">Contact Us</a></td>
            <td class="hvr" width="130px"><a href="">

            <div class="dropdown">

                  <button class="dropbtn">        
                  <table width="130px"><tr class="hvr"><td  width="60px"><a href="">Categories</a></td></tr></table>        
                  </button>

                  <div class="dropdown-content">
                  @foreach($categories as $c)
                  <a href=""><table><td width="160px" height="30px">{{$c->cat_name}}</td></table></a>
                  @endforeach

                  </div>
            </div>


            </a></td>
            <td width="550px">
                  <form action="" method="get">
                        <input style= "width:430px; height:30px;" type="text" name="search" placeholder="Search here by Course, Category or Instructor...">
                        <input style= "height:36px;" type="submit" value="🔍 Search">
                  </form>
            </td>
            <td class="hvr" width="150px"><a href="">Join as Instructor</a></td>
            <td class="hvr" width="80px"><a href="">Sign In</a></td>
            <td class="hvr" width="80px"><a href="">Sign up</a></td>
      </tr></table>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <table bgcolor="silver" height="150px" width="1245px"><tr>

      <td width="120px"></td>
      <td class="hvr" width="150px"><a href=""><img src="https://scontent.fdac13-1.fna.fbcdn.net/v/t1.15752-9/273060570_503948087800029_3713410203044222635_n.png?_nc_cat=109&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEbSNuyMM8wu79Lmmg_SRj9ACfagN3J1FkAJ9qA3cnUWW_3ZSGIAtVrhlAFsehce153C3_F91cn3fmichHkyS2O&_nc_ohc=-R_QXiHya24AX8HOC5u&tn=brwslr_m5-noJKqy&_nc_ht=scontent.fdac13-1.fna&oh=03_AVKbgd6BiQ56lP7Boank_KH3ku2djOluJobTcdf0Bs_JsA&oe=623A75B3" alt="logo" height="100px"></a></td><td width="120px"></td>
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
</html> -->


















































<!-- <!DOCTYPE html>
<html lang="en">
<head>
      <title>Student Header</title>
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
  

      </style>
</head>
<body>
      <table><tr height="50px">
            <td class="hvr" width="120px"><a href=""><img src="https://png.pngitem.com/pimgs/s/627-6275734_profile-icon-contacts-hd-png-download.png" 
            height="30px" width="30px" alt="LOGO"></a></td>
            <td class="hvr" width="110px"><a href="">Contact Us</a></td>
            <td class="hvr" width="130px"><a href="">

            <div class="dropdown">

                  <button class="dropbtn">        
                  <table width="130px"><tr class="hvr"><td  width="60px"><a href="">Categories</a></td></tr></table>        
                  </button>

                  <div class="dropdown-content">
                  @foreach($categories as $c)
                  <a href=""><table><td width="160px" height="30px">{{$c->cat_name}}</td></table></a>
                  @endforeach

                  </div>
            </div>


            </a></td>
            <td width="550px">
                  <form action="" method="get">
                        <input style= "width:430px; height:30px;" type="text" name="search" placeholder="Search here by Course, Category or Instructor...">
                        <input style= "height:36px;" type="submit" value="🔍 Search">
                  </form>
            </td>
            <td class="hvr" width="150px"><a href="">Join as Instructor</a></td>
            <td class="hvr" width="80px"><a href="">Sign In</a></td>
            <td class="hvr" width="80px"><a href="">Sign up</a></td>
      </tr></table>

      
</body>
</html> -->