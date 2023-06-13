<h1>Go to <a href="{{route('home')}}">home</a> </h1>
<h2>hello <i>{{Session::get('name')}}</i>,
pay {{$c_price}} taka to buy the course: {{$c_name}}</h2>

<form action="{{route('paysub')}}" method="post">
      {{@csrf_field()}}
      
      <input type="hidden" name="c_id" value="{{$c_id}}">
      <input type="hidden" name="st_id" value="{{$s_id}}">
      <input type="hidden" name="p_amount" value="{{$c_price}}">
      <input type="radio" name="mfs" value="bkash">bkash &emsp;&emsp;&emsp;
      <input type="radio" name="mfs" value="nagad">nagad &emsp;&emsp;&emsp;
      <input type="radio" name="mfs" value="rocket">rocket &emsp;&emsp;&emsp;
      <input type="radio" name="mfs" value="upay">upay <br><br>
      <table><tr>
            <td>Phone Number(Transacted account):</td><td><input type="number" name="phone" Required></td>
      </tr><tr>
            <td>Trx ID(Check SMS after pay):</td><td><input type="text" name="trx_id" Required></td>
      </tr></table>
      <br>
      <input type="submit">
</form>