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
<form action="{{route('teams.store')}}" method="post" enctype="multipart/form-data">
@csrf



Team Name :<input type="text" name="team_name" style="margin-left:2.5em">

    <div class="error"><font color="red" size="2">{{ $errors->first('team_name') }}</p></font></div>
    <br><br><br>


 <button type="submit">Add Team</button>
 <button type="submit"><a href="{{route('team.index')}}">Cancel</a></button>
 <br><br><br>

@endsection