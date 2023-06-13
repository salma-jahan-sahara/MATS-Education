<h1>hhhhhhhhhhhhh</h1>
@foreach($student_courses as $course)
{{$course->c_id}} 
@foreach($student as $s)
@if($s->id==$course->st_id)
{{$s->st_name}}
@endif
@endforeach
{{$course->st_id}} 
{{$course->tot_topic}} 
{{$course->complete_topic}} <br>

 @endforeach


