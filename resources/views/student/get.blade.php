
@extends('layouts.app')
@section('content')

<h1>Student Get Page</h1>
<h3>ID: {{$std->id}}</h3>
<h3>Name: {{$std->name}}</h3>
<h3>University ID: {{$std->uid}}</h3>
<h3>Phone: {{$std->phone}}</h3>
<br><br><br>

@endsection