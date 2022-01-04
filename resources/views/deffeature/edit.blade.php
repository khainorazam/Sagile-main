@extends('layouts.app2')


@section('content')

<br><br><br>
<form action="{{route('deffeature.update', $deffeature)}}" method="post">
        @csrf
        
Title :<input type="text" name="title" style="margin-left:2.5em" value="{{$deffeature->title}}">
<br><br><br>

Description :<input type="text" name="desc" style="margin-left:2.5em" value="{{$deffeature->desc}}">
<br><br><br>
 
        <button type="submit" method="post">Update</button>
        <button type="submit"><a href="{{route('deffeature.index')}}">Cancel</a></button>
        
</form>
    
    <br><br><br>
@endsection

    