@extends('layouts.app2')

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')

<br><br><br>
<form action="{{route('codestand.update', $codestand)}}" method="post">
        @csrf
        
 Coding Standard :<input type="text" name="codestand_name" style="margin-left:2.5em" value="{{$codestand->codestand_name}}">
<br><br><br>
 
        <button type="submit" method="post">Update</button>
        
        <button type="submit", formaction="{{route('codestand.destroy', $codestand)}}", method="delete">Delete</button>
</form>
    
    <br><br><br>
@endsection

    