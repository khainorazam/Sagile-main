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
{{-- @foreach($teams as $team)
        <li>
            <a href="{{ route('teams.edit', [$team]) }}">
             {{ $team->team_name }} 
            </a>
                     
        </li>
@endforeach --}}
@endsection

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')

        <!-- The Team -->
        <div>
          <h1>{{ $teams->team_name }}
        </div>
        <table>
                <tr>
                    <th>Username</th>  
                    <th>Role</th>
                    <th>Delete</th>
                </tr>
                
                @forelse($teammappings as $teammapping)
                    <tr> 
                        <th>
                            {{ $teammapping->username }}
                        </th>
                        <th>
                            {{ $teammapping->role_name }}
                        </th>
                        <th>
                            <button type="submit"><a href="{{route('teammappings.destroy', $teammapping)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete</button>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No team members added yet</td>
                    </tr>
                @endforelse
          </table>
  <br><br><br>

   <button type="submit"><a href="{{route('teammappings.create', $teams['team_name'])}}">Add New Member</a></button>
   

@endsection

