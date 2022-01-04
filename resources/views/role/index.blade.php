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
                     
@endsection


@section('content')
<br><br><br>


<table>

<tr>
    <th>Role Name</th>
    <th>Edit</th>
    <th>Delete</th>

</tr>

@foreach($roles as $role)

      <tr> 
          <th>
                  {{ $role->role_name }}
          </th>

          <th>
              <button type="submit"><a href="{{route('roles.edit', $role)}}">Edit</a></button>
          </th>

          <th>
              <button type="submit"><a href="{{route('roles.destroy', $role)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete</button>
          </th>
          
      </tr>

@endforeach

  </table>
  <br><br>

  <button type="submit"><a href="{{route('roles.create')}}">Add Role</a></button>

@endsection

