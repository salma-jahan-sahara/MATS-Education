
      <h1>Students List</h1>   

      <table>
            @foreach($students as $s)
            <tr>
            <td>{{$s->id}}. </td>
                  <td><a href="/st/get/{{encrypt($s->id)}}">{{$s->name}}</a></td>
                  <td>{{$s->uid}}</td>
                  <td>{{$s->phone}}</td>
                  <td>{{$s->uname}}</td>
                  <td>{{$s->pass}}</td>
            </tr>
            @endforeach
      </table>


<!--  -->