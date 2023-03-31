@extends('layouts.app2')

@section('navbar')
@if ($role_name == 'Admin')
    @include('inc.navbar')

@elseif ($role_name == 'Project Manager')
    @include('inc.navprojectmanager')

@elseif ($role_name == 'Product Owner')
    @include('inc.navproductowner')

@elseif ($role_name == 'Scrum Master')
    @include('inc.navscrummaster')

@elseif ($role_name == 'Developer')
    @include('inc.navdeveloper')
@endif
@endsection

@section('content')
<br><br><br>
<form action="{{route('secfeature.store')}}" method="post" enctype="multipart/form-data">

@csrf

 Security Feature Name :<input type="text" name="secfeature_name" style="margin-left:2.5em">
 <div class="error"><font color="red" size="2">{{ $errors->first('secfeature_name') }}</font></div>
<br><br><br>

 Description :<input type="text" name="secfeature_desc" style="margin-left:2.6em" height="30" width="70">
 <div class="error"><font color="red" size="2">{{ $errors->first('secfeature_desc') }}</font></div>
 <br><br><br>

 <button type="submit">Save</button>
 <button type="submit"><a href="{{route('secfeature.index')}}">Cancel</a></button>
 <br><br><br>
 @endsection