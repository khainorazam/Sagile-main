@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>
    <form action="{{route('codestand.update', $codestand)}}" method="post">
        @csrf
        
        Coding Standard :<input type="text" name="codestand_name" style="margin-left:2.5em" value="{{$codestand->codestand_name}}">
        <div class="error"><font color="red" size="2">{{ $errors->first('codestand_name') }}</p></font></div>
        <br>

        <button type="submit" method="post">Update</button>
    </form>
    
    <br>
@endsection

    