<?php
header('content-type:image/jpeg');
 $font = "KIN668.TTF";
 $font_t ="Louis George Cafe Bold Italic.ttf";
 $font_f ="Louis George Cafe Light.ttf";
 $font_s ="Creattion Demo.otf";
 
 $image = imagecreatefromjpeg("certificate.jpeg");
 $color = imagecolorallocate($image,19,21,22);
 $name = "Salma Jahan Sahara";
 imagettftext($image,40,0,350,450,$color,$font,$name);
 
 $coursename = "Object Oriented Programming II";
 imagettftext($image,35,0,320,570,$color,$font_t,$coursename);
 
 $date = "Successfully on 13th March 2022";
 imagettftext($image,25,0,420,615,$color,$font_f,$date);
 
 $signature = "Tanvir Ahmed";
 imagettftext($image,50,0,750,740,$color,$font_s,$signature);
 
 
 imagejpeg($image);
 
 imagedestroy($image);
?>
