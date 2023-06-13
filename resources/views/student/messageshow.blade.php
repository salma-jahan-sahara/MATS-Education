<!DOCTYPE html>
<html lang="en">
<head>
      <title>Message Show</title>
      <style>
      /* table, th, td {
                  border: 1px solid black;
                  border-collapse: collapse;}; */

                  #msgsr {
     background-color: rgb(179, 231, 255); 
     /* text-align: left;  */
     padding-right: 10px;
     padding-top: 5px;
     padding-left: 10px;
     border-radius: 10px;
    }

    
    #msgrr {
     background-color: rgb(230, 188, 255);  
     padding-top: 2px;
     padding-right: 10px;
     padding-left: 10px;
     border-radius: 10px;
    }
      </style>
</head>
<body>
      @foreach($userlogins as $ul)
    @if($ul->id==Session::get('other'))
     <?php $rec_name=$ul->u_name;
      $rec_img=$ul->u_pro_pic; 
      $rec_act=$ul->u_active; ?>
    @endif
      @endforeach
<table>
      <tr><td width= "345px"></td><td width= "220px"></td><td width= "345px"></td></tr>


       @foreach($msg as $m) <!--if i(rec) am 3, you(sender) are 5 -->
            <tr>
                  @if ($m->sender_un == Session::get('id'))
                  <td></td>
                  <td colspan="2" style="text-align: right;">
                  <table align="right"><td id="msgsr">
                  <p style="font-weight: bold; text-align: left;  ">{{$m->message}}</p>
                  <p style="font-size:10px; text-align: right; display: inline;">{{$m->datetime}}</p></td></table>
                  </td>
                  @elseif(($m->receiver_un == Session::get('id')))
                  
                  <td colspan="2" >
                  
                  <table><td style="vertical-align:bottom"><table><tr><td><img src="{{asset($rec_img)}}" style="border-radius: 300px; background: grey; padding:1px; height: 35px; width: 35px; display:inline;" alt=""><table style="display:inline;float:left;">
                  @if($rec_act=="Active")
                  <td style="height: 5px; width:5px; background-color:green;"></td>
                  @else
                  <td style="height: 5px; width:5px; background-color:red;"></td>
                  @endif
            
            </table></td></tr></table></td>
                  <td id="msgrr"><p style="font-size:10px; font-weight: bold;display: inline;">{{$rec_name}}</p><br>
                  <p style="font-weight: bold; text-align: justify; display: inline;">{{$m->message}}</p>
                  <p style="font-size:10px; text-align: right; display: inline;"><br>{{$m->datetime}}</p></td></table>
                  </td>
                  <td></td>
                  @endif
            
                  
                  <!-- <td>{{$m->pass}}</td> -->
            </tr>
            <tr  height="5px"><td></td><td></td><td></td></tr>
            @endforeach
            <tr id="b"></tr>
</table>
</body>
</html>