@extends('layouts.app2')



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