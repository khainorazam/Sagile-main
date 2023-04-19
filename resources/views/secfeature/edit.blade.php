@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
    <form action="{{route('secfeature.update', $secfeature)}}" method="post">
        @csrf
        
        Security Feature Name :<input type="text" name="secfeature_name" style="margin-left:2.5em" readonly value="{{$secfeature->secfeature_name}}">
        <div class="error"><font color="red" size="2">{{ $errors->first('secfeature_name') }}</font></div>
        <br><br>
        
        Description :<input type="text" name="secfeature_desc" style="margin-left:2.6em" height="10" width="20" value="{{$secfeature->secfeature_desc}}">
        <div class="error"><font color="red" size="2">{{ $errors->first('secfeature_desc') }}</font></div>
        <br><br>

        <button type="submit">Update</button>
    </form>
 <br>
 @endsection