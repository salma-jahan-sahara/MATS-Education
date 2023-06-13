<!DOCTYPE html>
<html>
<head>
    <title>MATS Payment Mail</title>
</head>
<body>
    
   
<h2>
{{ $greet }}<br>
{{ $body }}<br><br>
{{ $cn }}<br>
{{ $tk }}<br>
{{ $mfs }}<br>
{{ $trx }}<br><br>

</h2><br>
<h2 style="color: red; display: inline;">{{ $check }}</h2>
<h2 style="display: inline;">Otherwise, <a href="http://127.0.0.1:8000/meslistcon/1">contact with Admin</a></h2><br>
    <h1>Best Regards,<br>{{ $mats }}</h1>

    
</body>
</html>




