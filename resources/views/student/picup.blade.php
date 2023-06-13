<form action="" method="post" enctype="multipart/form-data">
            
            {{@csrf_field()}}

            

           
            
            <tr><td style="font-size: 22px; text-align: right;"> Profile Picture <p style="font-size: 12px; display:inline;">(optional) </p>:</td><td></td>
            <td style="font-size: 18px;"> <input style="height:30px; width:265px; font-size: 18px;"type="file" name="pro_pic">
            <br>@error('pro_pic')
            <span style="color:red;">{{$message}}</span>
            @enderror
            </td></tr>

            <input type="submit" value="Submit" style= "width: 200px; height: 50px; font-size: 20px; background-color:rgb(144, 160, 255);">
      </form></table>

      </td></table></center>
     
</body>
</html>
