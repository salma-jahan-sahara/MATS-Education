<!DOCTYPE html>
<html lang="en">
<head>
      <title>Search Employees</title>
      <style>table, th, td {
            border: 3px solid black;
            border-collapse: collapse;}
      </style>
</head>
<body>
<h2><a href="{{Route('bview')}}">View</a>&emsp;&emsp;
<a href="{{Route('binsert')}}">Insert</a>&emsp;&emsp;</h2>

<form action="{{route('bsearchsub')}}" method="post">
      {{@csrf_field}}
      <input type="text" name="search">
      <input type="submit">
</form>


      
</body>
</html>
