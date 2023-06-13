<!--Main User Story Page-->
@extends('layouts.app2')
@include('inc.success')
@include('inc.style')

@include('inc.dashboard')

@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>

    @csrf
    <table id=userstories>
        <tr>
            <th>User Story</th>
            <th>Performance</th>
            <th>Security</th>
            <th>Status</th>
            <th>Edit</th> 
            <th>Delete</th>
            <th>Task</th>
            
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

            <?php
              $status = $statuses->firstWhere('id', $userstory->status_id);
            ?>

            {{ $status->title }}
            </th>

            <th>
              <button type="submit"><a href="{{route('userstory.edit', [$userstory->u_id])}}">Edit</a></button>
            </th>

            <th>
              <button type="submit"><a href="{{route('userstory.destroy', $userstory)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User Story ?');">Delete</button>
            </th>

            <th>
              <button type="submit"><a href="{{action('TaskController@index', $userstory['u_id'])}}">View</a></button>
            </th>
        </tr>

      @empty
      <tr>
        <td colspan="9">No user stories added yet</td>
      </tr>

        @endforelse
      </table>

        <br><br><br>
        <button type="submit"><a href="{{ route('userstory.create', $sprint_id) }}">Create User Story</a></button>

        <button type="submit"><a href="{{ route('userstory.backlog', $sprint_id) }}">Assign User Story from Backlog</a></button>
       <br><br>
      
@endsection