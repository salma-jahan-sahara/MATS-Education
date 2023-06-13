<!DOCTYPE html>
<html lang="en">
<head>
      <title>Update Employees</title>
</head>
<body>
<h2><a href="{{Route('bview')}}">View</a>&emsp;&emsp;
<a href="{{Route('binsert')}}">Insert</a>&emsp;&emsp;
<a href="{{Route('bupdate')}}">Update</a>&emsp;&emsp;
<a href="{{Route('bdelete')}}">Delete</a>&emsp;&emsp;</h2>
      <form action="{{Route('bupdatesub')}}" method="post">
            {{@csrf_field()}}
            Name: <input type="text" name="name" value="{{$employees->name}}"><br>
            Phone: <input type="number" name="phone" value="0{{$employees->phone}}"><br>
            Dept: <input type="text" name="dept" value="{{$employees->dept}}"><br>
            Salary: <input type="number" name="salary" value="{{$employees->salary}}"><br>
            <input type="hidden" name="id" value="{{$employees->id}}">
            <input type="submit">
      </form>
</body>
</html>
