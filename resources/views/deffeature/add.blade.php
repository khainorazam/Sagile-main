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

<br><br><br>
<table>
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Priority</th>
    <th>Status</th>
    <th>Add</th>
</tr>

@foreach($userstory as $ustory)
<tr> 
    <th>
            {{ $ustory->u_id }}
    </th>

    <th>
            {{ $ustory->user_story }}
    </th>

    <th>
      {{ $ustory->desc_story }}
    </th>

    <th>
      {{ $ustory->prio_story }}
    </th>

    <th>
        {{ $ustory->status_title }}
    </th>

   
    {{-- <th>
    <a href="{{route('deffeature.add', $ustory)}}">
        Add
    </a>
    </th> --}}
</tr>
@endforeach
</table>
<br><br><br>

<!--<button type="submit"><a href="{{route('deffeature.create')}}">Add User Stories</a></button>--!

@endsection