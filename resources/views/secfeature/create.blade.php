@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>
    <form action="{{route('secfeature.store')}}" method="post" enctype="multipart/form-data">
    @csrf
        Security Feature Name :<input type="text" name="secfeature_name" style="margin-left:2.5em">
        <div class="error"><font color="red" size="2">{{ $errors->first('secfeature_name') }}</font></div>
        <br><br>

        Description :<input type="text" name="secfeature_desc" style="margin-left:2.6em" height="30" width="70">
        <div class="error"><font color="red" size="2">{{ $errors->first('secfeature_desc') }}</font></div>
        <br><br><br>

        <button type="submit">Add Security Feature</button>
    </form>
 <br>
 @endsection