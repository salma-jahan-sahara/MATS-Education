<!DOCTYPE html>
<html lang="en">
<head>
      <title>Insert Employees</title>
</head>
<body>
<h2><a href="{{Route('bview')}}">View</a>&emsp;&emsp;
<a href="{{Route('binsert')}}">Insert</a>&emsp;&emsp;
<a href="{{Route('bupdate')}}">Update</a>&emsp;&emsp;
<a href="{{Route('bdelete')}}">Delete</a>&emsp;&emsp;</h2>
      <form action="{{Route('binsertsub')}}" method="post">
            {{@csrf_field()}}
            Name: <input type="text" name="name" placeholder="Enter Name"><br>
            Phone: <input type="number" name="phone" placeholder="Enter Phone Number"><br>
            Dept: <input type="text" name="dept" placeholder="Enter Department"><br>
            Salary: <input type="number" name="salary" placeholder="Enter Salary"><br>
            <input type="submit">
      </form>
</body>
</html>
