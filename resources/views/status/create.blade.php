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
<form action="{{route('statuses.store')}}" method="post" enctype="multipart/form-data">
@csrf

Status :<input type="text" name="title" style="margin-left:2.5em">

   <div class="error"><font color="red" size="2">{{ $errors->first('title') }}</p></font></div>
   <br>

Slug :<input type="text" name="slug" style="margin-left:2.5em">

   <div class="error"><font color="red" size="2">{{ $errors->first('slug') }}</p></font></div>
   <br>

Order :<input type="text" name="order" style="margin-left:2.5em">

   <div class="error"><font color="red" size="2">{{ $errors->first('order') }}</p></font></div>
   <br>

User ID :<input type="text" name="user_id" style="margin-left:2.5em">

<div class="error"><font color="red" size="2">{{ $errors->first('user_id') }}</p></font></div>
<br><br>

 <button type="submit">Add Status</button>
 <button type="submit"><a href="{{route('status.index')}}">Cancel</a></button>
 <br><br><br>

@endsection