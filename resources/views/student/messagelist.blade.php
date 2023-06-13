<!DOCTYPE html>
<html lang="en">
<head>
      <title>Message List</title>
      <style>
      /* table, th, td {
                  border: 1px solid black;
                  border-collapse: collapse;}; */
      </style>
</head>
<body>
      <?php $x=1;?>
@foreach($msgl as $m) <!--if i(rec) am 3, you(sender) are 5 -->
      <?php $flag=0; ?>
      @if ($m->sender_un ==Session::get('id'))
            <?php 
            for($i=1; $i<$x; $i++){
                  
                  if($_POST["list".$i]==$m->receiver_un)
                  {$flag=1;}
            }
            if ($flag!=1){
            $_POST["list".$x] = $m->receiver_un;
            $x++;
            }
            ?>
      @else
            <?php 
            for($i=1; $i<$x; $i++){
                  
                  if($_POST["list".$i]==$m->sender_un)
                  {$flag=1;}
            }
            if ($flag!=1){
            $_POST["list".$x] = $m->sender_un;
            $x++;
            }
            ?>
      
      @endif

     
      
      @endforeach
<?php 
for($i=1; $i<$x; $i++){
      echo '<a href="meslistcon/'.$_POST["list".$i].'">';?>
@foreach($userlogins as $uls)
@if($uls->id==$_POST["list".$i])
      <table style="display:inline;"><tr height="30px">
      @if($uls->u_type=="student")  
      <td><img src="{{asset('storage/student/'.$uls->u_pro_pic)}}" height="30px" width="30px"></td>
      @elseif($uls->u_type=="instructor")
      <td><img src="{{asset('storage/instructor/'.$uls->u_pro_pic)}}" height="30px" width="30px"></td>
      @else

      <td><img src="{{asset('storage/mats.png')}}" height="30px" width="30px"></td>
      @endif

      <td><table style="display:inline;float:left;">
                  @if($uls->u_active=="Active")
                  <td style="height: 5px; width:5px; background-color:green;"></td>
                  @else
                  <td style="height: 5px; width:5px; background-color:red;"></td>
                  @endif
            
            </table>{{$uls->u_name}}</td></tr></table>
@endif
@endforeach

<?php echo "</a><br>";}?>

      

      
    

</body>
</html>