@extends('layouts.app2')

@include('inc.style')

@section('dashboard')

@foreach($projects as $project)
        <li>
            <a href="{{ route('projects.edit', [$project]) }}">
             {{ $project->proj_name }} 
            </a>
                     
        </li>
@endforeach
        
@if($projects->isEmpty())
     No project.
@endif
@endsection


@section('content')
<br><br><br>
    <a href="{{route('profeature.index')}}" class="button">Project List</a>
    <a href="{{route('sprints.index')}}" class="button">Sprint</a>
    <a href="{{route('userstory.index')}}" class="button">User Stories</a>
    

<br><br><br>

<div class="col-md-4">
    <form action="search" method="get">
    <div class="input-group">
    <input type="search" name="search" class="form-control">
    <span class="input-group-btn">
    <button type="submit" class="btn btn-primary">Search Project</button>
</span>
</div>
</form>
</div>
<br><br><br>

@csrf
<table id="sprint">
  <tr>
      <th>ID</th>
      <th>Sprint Name</th>
      <th>Description</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Task Assign To</th>
      <th>Edit</th>
      <th>View</th>
  </tr>
  
  
  @foreach($sprints as $sprint)
  <tr> 
      <th>
              {{ $sprint->sprint_id }}
      </th>
  
      <th>
              {{ $sprint->sprint_name }}
      </th>  
      
      <th>
          {{ $sprint->sprint_desc }}
      </th>

      <th>
        {{ $sprint->start_sprint }}
      </th>

      <th>
        {{ $sprint->end_sprint }} 
      </th>
  
      <th>
        {{ $sprint->users_name }} 
      </th>

      
      <th>
      <a href="{{route('sprints.edit', [$sprint->sprint_id])}}">
          Edit
      </a>
      </th>
  </tr>

  
  @endforeach
  </table>
    

    
<br><br><br>
<button type="submit"><a href="{{route('sprints.create')}}">Create Sprint</a></button>
   
@endsection



          