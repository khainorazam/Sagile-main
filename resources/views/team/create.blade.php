@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br><br>
<form action="{{route('teams.store')}}" method="post" enctype="multipart/form-data">
@csrf

    Team Name :<input type="text" name="team_name" style="margin-left:2.5em">

    <div class="error"><font color="red" size="2">{{ $errors->first('team_name') }}</p></font></div>
    <br><br><br>

    <div class="row">
        <label for="title">Project:</label>
          <select name="proj_name" id="proj_name" class="form-control">
              <option value="" selected="false">Select</option>
                  @foreach($project as $projects)
                      <option value="{{ $projects->proj_name}}"> {{ $projects->proj_name}}</option>
                  @endforeach
          </select> 
    </div>
    <br><br><br>

    <div>
        <button type="submit">Create Team</button>
    </div>
    <br><br>
</form>
@endsection