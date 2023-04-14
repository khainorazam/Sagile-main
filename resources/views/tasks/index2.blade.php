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

@include('inc.navbar')

@section('content')
<br><br>
    <a href="{{route('profeature.index')}}" class="button">Project List</a>

    <h1>User Story {{ $u_id}} Task Info<h1>

    @csrf

    <table>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Order</th>
            <th>Status ID</th>   
            <th>Edit</th> <!--Not Done-->
            <th>Delete</th>
        </tr>
      @if(count($tasks) )
      @foreach($tasks as $task)
        <tr> 
            <th>
              {{ $task->id }}
            </th>
        
            <th>
              {{$task->title}}
            </th>
        
            <th>
              {{ $task->description }}
            </th>

            <th>
              {{ $task->start_date }}
            </th>

            <th>
              {{ $task->end_date }}
            </th>

            <th>
              {{ $task->order }}
            </th>
        
            <th>
              {{ $task->status_id }}
            </th>

            <!--Not Done-->
            <th>
            <a href="{{route('tasks.create')}}">
            Edit
            </a>
            </th>

            <th>
            <button type="submit"><a href="{{route('tasks.destroy', $task)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
            </th>

        </tr>
        @endforeach
      @endif

          
      </table>

  <br><br><br>

      <button type="submit"><a href="{{route('tasks.create')}}">Add Task</a></button>
      
@endsection