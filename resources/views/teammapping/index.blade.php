@extends('layouts.app2')


@include('inc.style')

@include('inc.success')

@section('dashboard')
{{-- @foreach($teams as $team)
        <li>
            <a href="{{ route('teams.edit', [$team]) }}">
             {{ $team->team_name }} 
            </a>
                     
        </li>
@endforeach --}}
@endsection

@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
        <!-- The Team -->
        <table>
                <tr>
                    <th>Username</th>  
                    <th>Role</th>
                    <th>Remove</th>
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
                            <button type="submit"><a href="{{route('teammappings.destroy', $teammapping)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this team member?');">Remove</button>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No team members added yet</td>
                    </tr>
                @endforelse
          </table>
  <br><br><br>

   <button type="submit">
        <a href="{{ route('teammappings.create', ['teams' => $teams, 'team_name' => $teams->team_name]) }}">Add New Member</a>
   </button>
   

@endsection

