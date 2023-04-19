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