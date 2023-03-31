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
@if ($role_name == 'Admin')
    @include('inc.navbar')

@elseif ($role_name == 'Project Manager')
    @include('inc.navprojectmanager')

@elseif ($role_name == 'Product Owner')
    @include('inc.navproductowner')

@elseif ($role_name == 'Scrum Master')
    @include('inc.navscrummaster')

@elseif ($role_name == 'Developer')
    @include('inc.navdeveloper')
@endif
@endsection

@section('content')
<br><br><br>
<table>
<tr>
    <th>Code ID</th>
    <th>Coding Standard Title</th>
    <th>Edit</th>
    <th>Delete</th>
    
</tr>

@foreach($codestands as $codestand)
<tr> 
    <th>
            {{ $codestand->codestand_id }}
    </th>

    <th>
            {{ $codestand->codestand_name }}
    </th>

    <th>
        <button type="submit"><a href="{{route('codestand.edit', $codestand)}}">Edit</a></button>
    </th>

     <th>
        <button type="submit"><a href="{{route('codestand.destroy', $codestand)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this codestand?');">Delete</button>
     </th>

     

</tr>
@endforeach
</table>
<br><br><br>

<button type="submit"><a href="{{route('codestand.create')}}">Add Coding Standard</a></button>

@endsection