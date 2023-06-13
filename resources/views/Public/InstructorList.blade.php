@extends('layouts.publiclayout')
@section('content')

<center><a class="btn btn-primary btn-lg" style=" text-align: center; " href="{{route('instructor.instructor_reg')}}">Join us as a Instructor</a><br><br>
    <h1 style=" font-family: Times New Roman, Times, serif;">Our Certified Instructors</h1></center>

    <div class="row" style="padding-top: 40px"> <? //to make row col divs side by side?>

            <div class="col-sm-3"> <? //side catagories div?>
                <ul class="list-group">
                    <a href="{{route('public.instructorlist')}}" class="list-group-item list-group-item-action list-group-item-secondary" style=" margin-left:15px">
                        <h4>All Instructors</h4>
                    </a>
                    @foreach($categories as $cat)
                    <a href="{{route('public.instructorlist',['catid'=>encrypt($cat->id)])}}" class="list-group-item list-group-item-action list-group-item-secondary" style=" margin-left:15px">
                        <h4> {{$cat->cat_name}}</h4>
                    </a>
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-3"> <? //ins list div?>
            <ul>
                <table class="table table-hover" style=" width:800px;   margin-right:500px;"  >
                @if($catid=="all")                    
                    @foreach($instructors as $ins)
                    <tr class="clickable  " style="cursor:pointer; "  onclick="window.location='{{route('public.instructordetails',['id'=>encrypt($ins->id)])}}'">
                            <td style="width:150px; ">
                              
                                <img id="dpicon" src="{{asset('storage/instructor/'.$ins->ins_dp)}}"  style="width:150px; height:150px; border-radius:50%; "  alt="Image">
                              
                                
                            </td>
                            <td style=" padding: 40px;" >
                                <h4>{{$ins->ins_name}}</h4>
                                {{$ins->ins_degree}}<br>
                                Experience: {{$ins->ins_exp}}<br>
                            </td>
                    </tr>
                    @endforeach
                @else 
                    @foreach($instructors as $ins)
                   
                    @if($catid==$ins->ins_cat_fk)
                    <tr class="clickable  " style="cursor:pointer; "  onclick="window.location='{{route('public.instructordetails',['id'=>encrypt($ins->id)])}}'">
                            <td style="width:150px; ">
                               
                                <img id="dpicon" src="{{asset('storage/instructor/'.$ins->ins_dp)}}"  style="width:150px; height:150px; border-radius:50%; "  alt="Image">
                              
                                
                            </td>
                            <td style=" padding: 40px;" >
                                <h4>{{$ins->ins_name}}</h4>
                                {{$ins->ins_degree}}<br>
                                Experience: {{$ins->ins_exp}}<br>
                            </td>
                    </tr>
                    
                    @endif
                    @endforeach
                @endif
                </table>
            </ul>
            </div>

    </div>
@endsection