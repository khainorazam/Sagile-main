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

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')
<br><br><br>
<table>
<tr>
    <th>Feature ID</th>
    <th>Feature Name</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>

@foreach($perfeatures as $perfeature)
<tr> 
    <th>
        {{ $perfeature->perfeature_id }}
    </th>

    <th>
        {{ $perfeature->perfeature_name }}
    </th>

    <th>
        <button type="submit"><a href="{{route('perfeature.edit', $perfeature)}}">Edit</a></button>

    </th>

    <th>
        <button type="submit" method="post"><a href="{{action('PerformanceFeatureController@destroy', $perfeature['perfeature_id'])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this performance feature?');">Delete</button>
    </th>

</tr>
@endforeach
</table>
<br><br><br>

<button type="submit"><a href="{{route('perfeature.create')}}">Add Performance Feature</a></button>

@endsection