<!--Assign Backlog for Userstory Page-->
@extends('layouts.app2')
@include('inc.success')
@include('inc.style')
@include('inc.dashboard')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>

    @csrf
    <table id=backlogUserstory>
        <tr>
            <th>Backlog</th>
            <th>Performance</th>
            <th>Security</th>
            <th>Assign</th> 
        </tr>

      @forelse($userstories as $userstory)
        <tr> 
            <th>
              {{$userstory->user_story}}
            </th>
           
            <!--If the perfeature_id and secfeature_id does not contain anything, it will store as the string 'null'
                This condition here displays 'None selected if the features are empty'
                The false condition is displaying the features if it is not empty-->            
            <th>
              {{ $userstory->perfeature_id == 'null' ? 'None selected' : $userstory->perfeature_id }}
            </th>

            <th>
              {{ $userstory->secfeature_id == 'null' ? 'None selected' : $userstory->secfeature_id }}
            </th>
            
            <th>
                <button type="submit"><a href="{{ route('userstory.assign', ['userstory' => $userstory, 'sprint_id' => $sprint_id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to assign this Backlog to Sprint 1?');">Assign</button>
            </th>
          </tr>

      @empty
      <tr>
        <td colspan="4">No backlog added yet</td>
      </tr>

        @endforelse
      </table>

      <br><br>
      
@endsection