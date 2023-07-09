@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
<form action="{{route('teams.store')}}" method="post" enctype="multipart/form-data">
@csrf
<h3>1. If your team does not have any existing project yet:</h3>

<button type="submit"><a href="{{ route('projects.create') }}">Create Project</a></button>

<h3>2. If your project is listed in the existing project(s):</h3>

    Team Name :<input type="text" name="team_name" style="margin-left:2.5em">

    <div class="error"><font color="red" size="2">{{ $errors->first('team_name') }}</p></font></div>
    <br><br>

    <div class="row">
        <label for="title">Existing Project(s):</label>
        {{-- @if ($current_project != "")
            <input type="text" id="title" name="title" class="form-control" value="{{ $current_project }}">
        @else --}}
            <select name="proj_name" id="proj_name" class="form-control">
                <option value="" selected="false">Select</option>
                @foreach($project as $projects)
                    <option value="{{ $projects->proj_name }}"> {{ $projects->proj_name }}</option>
                @endforeach
            </select>
        {{-- @endif --}}
    </div>

    <br><br><br>

    <div>
        <button type="submit">Create Team</button>
    <div>
    <br><br>
</form>
@endsection