 <html>
    <body>
        <div>

        
        <a href ="{{route('admin.index')}}"> Home | </a>
        <a href ="{{route('admin.studentlist')}}"> List of Students | </a>
        <a href ="{{route('admin.instructorlist')}}"> List of Instructrors | </a>   
        <a href ="{{route('admin.courselist')}}"> List of Courses |</a>
        <a href ="{{route('admin.payment_req')}}"> Payments  |</a>
        <a href ="{{route('admin.add_instructor')}}"> Add Instructor  |</a>
        <a href ="{{route('admin.instructor_requests')}}"> Req_Instructors|  </a>
        <a href ="{{route('message')}}"> Message |</a>
        <a href ="{{route('signout')}}"> Sign Out  </a>

        </div>

        

        @yield('content')


        <div> Copyright Mats ©2022 </div> 
</body>
</html>
