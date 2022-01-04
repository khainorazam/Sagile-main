@extends('layouts.app2')
<style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }

        .button {
         background-color: #4CAF50; /* Green */
         border: none;
         color: white;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
        }
</style>

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
<br><br>
    <a href="{{route('profeature.index')}}" class="button">Project List</a>

    <h1>User Story {{ $u_id}} Task Info<h1>

    @csrf

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Order</th>
            <th>Status ID</th>   
            <th>Edit</th>
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