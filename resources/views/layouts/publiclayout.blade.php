<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/style.css">
    
    </head>
    <body>
        <a class="btn btn-secondary" href="{{route('home')}}">Home</a>
        <a class="btn btn-secondary" href="{{route('public.instructorlist')}}">Instructors</a>
<br><br>
         @yield('content')
     

        <div>Copy Right @copy MATS 2022</div>
    </body>
</html>