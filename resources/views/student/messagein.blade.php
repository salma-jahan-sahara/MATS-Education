<form action="{{route('message')}}#bottom" method="post">
{{@csrf_field()}}
      <input type="text" name="messagein" style=" height: 40px; width:700px;"  Placeholder="Type message here..." required  autocomplete="off">
      <input type="hidden" name="do" value="m_in">
      <input type="submit" value="Send" style=" height: 45px; width:130px;" >
</form>