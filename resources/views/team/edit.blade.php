@extends('layouts.app2')

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')

<br><br><br>
<form action="{{route('teams.update', $team)}}" method="post">
        @csrf
        
    Team Name :<input type="text" name="team_name" style="margin-left:2.5em" value="{{$team->team_name}}">
    <br><br><br>
 
    <div class="row">
      <label for="title">Project:</label>
      <!-- if there is already a project selected, make the input read-only -->
      <select name="proj_name" id="proj_name" class="form-control" @if($team->proj_name) disabled> @endif
        <option value="">Select</option>
        @foreach($project as $projects)
          <option value="{{ $projects->proj_name }}" 
            @if($projects->proj_name == $team->proj_name) 
              selected 
            @endif>
            {{ $projects->proj_name }}
          </option>                  
        @endforeach
      </select> 
    </div>

    <!-- hidden value because disabled cannot send through -->
    @if($team->proj_name)
      <input type="hidden" name="proj_name" value="{{ $team->proj_name }}">
    @endif
    <br><br><br>

        <button type="submit" method="post">Update</button>
        <button type="submit"><a href="{{route('team.index')}}">Cancel</a></button>
        
</form>
    
    <br><br><br>
@endsection

    