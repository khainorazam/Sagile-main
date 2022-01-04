@extends('layouts.app2')



@section('content')

<br><br><br>
<form action="{{route('teams.update', $team)}}" method="post">
        @csrf
        
 Team Name :<input type="text" name="team_name" style="margin-left:2.5em" value="{{$team->team_name}}">
<br><br><br>
 
        <button type="submit" method="post">Update</button>
        <button type="submit"><a href="{{route('team.index')}}">Cancel</a></button>
        
</form>
    
    <br><br><br>
@endsection

    