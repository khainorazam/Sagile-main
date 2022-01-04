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
<h3></h3>
<table>
<tr>
    {{-- <th>ID</th> --}}
    <th>Title</th>
    <th>Description</th>
    {{--<th>Priority</th>
    <th>Status</th>
    <th>Add</th>--}}
    <th>Edit</th>
    <th>Delete</th>
</tr>

@foreach($deffeatures as $deffeature)
<tr> 
    {{-- <th>
            {{ $deffeature->u_id }}
    </th> --}}

    <th>
            {{ $deffeature->title }}
    </th>

    <th>
      {{ $deffeature->desc }}
    </th>

    {{-- <th>
      {{ $ustory->prio_story }}
    </th>

    <th>
        {{ $ustory->status_title }}
      </th> --}}

      <th>
        <button type="submit"><a href="{{route('deffeature.edit', $deffeature)}}">Edit</a></button>
    </th>

     <th>
        <button type="submit"><a href="{{route('deffeature.destroy', $deffeature)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this defect feature?');">Delete</button>
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

<button type="submit"><a href="{{route('deffeature.create')}}">Add Defect Feature</a></button>

@endsection