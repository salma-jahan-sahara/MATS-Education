<!DOCTYPE html>
<html lang="en">
<head>
<title>MATS Certificate</title>
</head>
<body>
@extends('layouts.app1')
@section('content')
@if($sc)
<table>
    <tr>
        <td  width="600px">
            <br><br><form action="{{route('certificate')}}" method="get" style="display:inline;">
            {{@csrf_field()}}
    <input type="text" style="height: 30px; width:250px;" name="v_id" placeholder="search by verification code only " required>
    <input style="height: 35px; width:80px;" type="submit">
</form>
<form action="{{route('genpdf')}}" method="get" style="display:inline; float:right;">
            {{@csrf_field()}}
   
    <input style="height: 35px; width:160px; background-color:#85FF86" type="submit" value="Download Certificate">
</form>
<br><br>
           <h2 style="text-align: justify;"> Hello {{$ul->u_name}}, <br>
            Congratulations! You successfully complete the course.
            Please download the image of your certificate. Simply right click on your achieved certicate and save the image. <br><br>
            Thank you for being with us!</h2>

        </td>
        <td width="5px" style="background-color:grey;"></td><td width="10px"></td>
        <td><br><br><?php 




$img = Image::make(public_path('cert/certificate.jpg'));  
       $img->text(strtoupper($ul->u_name), 700, 500, function($font) {  
          $font->file(public_path('cert/namefont1.ttf'));  
          $font->size(80);  
          $font->color('#000000');  
          $font->align('center');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
      $img->save(public_path('cert/h3.jpg'));
     
      $img = Image::make(public_path('cert/h3.jpg'));  
       $img->text(strtoupper('successfully on '.date('jS F Y',strtotime($cfs->cer_date))), 700, 680, function($font) {  
          $font->file(public_path('cert/Louis George Cafe bold.ttf'));  
          $font->size(30);  
          $font->color('#000000');  
          $font->align('center');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
      $img->save(public_path('cert/h3.jpg')); 

      $img = Image::make(public_path('cert/h3.jpg'));  
       $img->text($cs->c_title, 700, 635, function($font) {  
          $font->file(public_path('cert/Louis George Cafe Bold.ttf'));  
          $font->size(50);  
          $font->color('#000000');  
          $font->align('center');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
      $img->save(public_path('cert/h3.jpg'));  

      $img = Image::make(public_path('cert/h3.jpg'));  
       $img->text($inst->ins_name, 980, 820, function($font) {  
          $font->file(public_path('cert/Creattion Demo.otf'));  
          $font->size(70);  
          $font->color('#000000');  
          $font->align('center');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
      $img->save(public_path('cert/h3.jpg'));

      $img = Image::make(public_path('cert/h3.jpg'));  
       $img->text('verify: 127.0.0.1:8000/certificate/'.$cfs->v_id, 110, 980, function($font) {  
          $font->file(public_path('cert/Louis George Cafe Bold.ttf'));  
          $font->size(30);  
          $font->color('#000000');  
          $font->align('left');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
      $img->save(public_path('cert/h3.jpg'));  

        

      
?>

       <img src="{{asset('cert/h3.jpg')}}" height="480px">



<br><br></td>
    </tr>
</table>
@else
<br><br>
buy the course first
<br><br>
<br><br>
<br><br>
<br><br><br><br>
<br><br>
<br><br>
<br><br>
<br><br>
@endif
@endsection
</body>
</html>
