@extends('layouts.app2')


@section('content')
<br><br>
<form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
@csrf
 
 Project Title :<input type="text" name="proj_name" style="margin-left:2.5em">

    <div class="error"><font color="red" size="2">{{ $errors->first('proj_name') }}</p></font></div>
    <br><br>

 Description :<input type="text" name="proj_desc" style="margin-left:2.6em" height="10" width="20">

    <div class="error"><font color="red" size="2">{{ $errors->first('proj_desc') }}</font></div>
    <br><br>

 Start Date :<input type="date" name="start_date" style="margin-left:3.2em">

    <div class="error"><font color="red" size="2">{{ $errors->first('start_date') }}</font></div>
    <br><br><br>


 Completion Date :<input type="date" name="end_date" style="margin-left:0.3em" >

    <div class="error"><font color="red" size="2">{{ $errors->first('end_date') }}</font></div>
    <br><br><br>


 <button type="submit">Submit</button>
 <button type="submit"><a href="{{route('profeature.index')}}">Cancel</a></button>
 <br><br><br>
 @endsection