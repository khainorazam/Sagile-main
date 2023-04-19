@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>
    <form action="{{route('perfeature.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        Performance Feature Name :<input type="text" name="perfeature_name" style="margin-left:2.5em">
        <div class="error"><font color="red" size="2">{{ $errors->first('perfeature_name') }}</font></div>
        <br><br>
        <button type="submit">Save</button>
    </form>
<br>
 @endsection