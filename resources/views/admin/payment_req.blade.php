
@extends('layouts.head')

@section('content')


<h1>Payment List:</h1>

<table>

    <tr>
            <th>Id</th>
            <th>Course Name</th>
            <th>Student name</th>
            <th>Amount</th>
            <th>Payment gateway</th>
            <th>Phone</th>
            <th>trx_id</th>
            <th>Status</th>


            <th colspan="2">Decision</th>
            
    </tr>



    @foreach($payments as $p)
    <tr>
        <td>{{$p->id}}</td>
        <td><a href="{{route('admin.coursedetail',['id'=>encrypt($p->c_id)])}}">{{$p->c_id}}</a></td>
        <td><a href="{{route('admin.studentdetail',['id'=>encrypt($p->st_id)])}}">{{$p->st_id}}</a></td>
        <td>{{$p->p_amount}}</td>
        <td>{{$p->p_mfs}}</td>
        <td>{{$p->p_phone}}</td>
        <td>{{$p->p_trxid}}</td>
        <td>{{$p->p_status}}</td>
        

        <td><form action="{{route('admin.payment_req')}}" method="post">
        {{@csrf_field()}}
        <input type="hidden" name="p_id" value="{{$p->id}}">
        <input type="hidden" name="c_id" value="{{$p->c_id}}">
        <input type="hidden" name="st_id" value="{{$p->st_id}}">
        <input type="submit" name="dec" style="background-color: rgb(145, 250, 159);" Value="Accept">
        </form></td>

        <td><form action="{{route('admin.payment_req')}}" method="post">
        {{@csrf_field()}}
        <input type="hidden" name="p_id" value="{{$p->id}}">
        <input type="submit" name="dec" style="background-color: rgb(255, 162, 162);" Value="Reject">
        </form></td>

       
      

    </tr>
    @endforeach
</table>  


@endsection