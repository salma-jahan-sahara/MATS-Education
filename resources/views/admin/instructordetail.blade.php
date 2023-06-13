
@extends('layouts.head')

@section('content')


<h1>Instructor  Information</h1>

    <h3> {{$instructor->ins_dp}}</h3>
    <h3>Instructor Name: {{$instructor->ins_name}}</h3>
    <h3>Instructor Id: {{$instructor->id}}</h3>
    <h3>Instructor Username: {{$instructor->ins_username}}</h3>
    <h3>Instructor Degree: {{$instructor->ins_degree}}</h3>
    <h3>Instructor biography: {{$instructor->ins_bio}}</h3>
    <h3>Instructor Phone: {{$instructor->ins_phone}}</h3>
    <h3>Instructor Email: {{$instructor->ins_email}}</h3>
    <h3>Instructor Expricence: {{$instructor->ins_exp}}</h3>
    <h3>Instructor JoinDate: {{$instructor->ins_joindate}}</h3>

    
    @endsection