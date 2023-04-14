@extends('layouts.app2')

@include('inc.style')

@include('inc.success')
@include('inc.dashboard')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
<table>

<tr>
    <th>Team Name</th>
    <th>Project</th>
    <th>View Members</th>
    <th>Delete</th>

</tr>

@if ($teams->isEmpty())
    <h3>Create a team and assign a project to the team</h3>
    <h3>Then, assign yourself (and/or your team members) to the team</h3>
@else

@foreach($teams as $team)

      <tr> 

          <th>
                  {{ $team->team_name }}
          </th>
          <th>
                  {{ $team->proj_name }}
          </th>
          <th>
              <button type="submit"><a href="{{action('TeamMappingController@index', $team['team_name'])}}">View</button>
          </th>
          <th>
              <button type="submit"><a href="{{route('teams.destroy', $team)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this team?');">Delete</button>
          </th>
          
      </tr>

@endforeach

@endif

  </table>
  <br><br><br>

  <button type="submit"><a href="{{route('teams.create')}}">Add Team</a></button>

@endsection

