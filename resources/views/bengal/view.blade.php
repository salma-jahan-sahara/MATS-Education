<!DOCTYPE html>
<html lang="en">
<head>
      <title>View Employees</title>
      <style>table, th, td {
            border: 3px solid black;
            border-collapse: collapse;}
      </style>
</head>
<body>
<h2><a href="{{Route('bview')}}">View</a>&emsp;&emsp;
<a href="{{Route('binsert')}}">Insert</a>&emsp;&emsp;
<a href="{{Route('bupdate')}}">Update</a>&emsp;&emsp;
<a href="{{Route('bdelete')}}">Delete</a>&emsp;&emsp;</h2>
<table>
      <tr style="background-color: grey">
            <th width="20px">ID</th>
            <th width="200px">Name</th>
            <th width="300px">Phone</th>
            <th width="300px">Department</th>
            <th width="100px">Salary</th>
            <th width="75px">Update</th>
            <th width="75px">Delete</th>
      </tr>
@foreach($employees as $emp)
<tr>
      <td>{{$emp->id}}</td>
      <td>{{$emp->name}}</td>
      <td>0{{$emp->phone}}</td>
      <td>{{$emp->dept}}</td>
      <td>{{$emp->salary}}</td>
      <td><form action="/bengal/update/{{$emp->id}}">{{@csrf_field()}}<input type="submit" value="update"></form></td>
      <td><form action="/bengal/delete/{{$emp->id}}">{{@csrf_field()}}<input type="submit" value="delete"></form></td>
</tr>
      
@endforeach
</table>

      
</body>
</html>
