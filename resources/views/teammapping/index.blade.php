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
@foreach($teams as $team)
        <li>
            <a href="{{ route('teams.edit', [$team]) }}">
             {{ $team->team_name }} 
            </a>
                     
        </li>
@endforeach
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
    <th>Role</th>
    <th>Username</th>
    <th>Team</th>
   {{--<th>Edit</th> --}} 
    <th>Delete</th>
</tr>

@foreach($teammappings as $teammapping)

      <tr> 

          <th>
                  {{ $teammapping->role_name }}
          </th>

          <th>
                  {{ $teammapping->username }}
          </th>

          <th>
                  {{ $teammapping->team_name }}
          </th>

         {{--<th>
              <button type="submit"><a href="{{route('teammappings.edit', $teammapping)}}">Edit</a></button>
          </th> --}} 
         

          <th>
              <button type="submit"><a href="{{route('teammappings.destroy', $teammapping)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete</button>
          </th>
          
      </tr>

@endforeach

  </table>
  <br><br><br>

   <button type="submit"><a href="{{route('teammappings.create', $teammapping['team_name'])}}">Add New Member</a></button>
   {{-- --}}

@endsection

