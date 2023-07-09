<!--Project Main Page-->
@extends('layouts.app2')
@include('inc.style')

@include('inc.success')

@include('inc.dashboard')

@include('inc.navbar')

@section('content')

@include('inc.title')
<br>

<table>

<tr>
    <th>Title</th>
    <th>Description</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Backlog</th>
    <th>Sprint</th>
</tr>

@if ($pros->isEmpty())
    <h3>There are no projects yet:</h3>
    <p>Add a new team or assign yourself to a team in <b>Team</b></p>
    
@else

@foreach($pros as $pro)

      <tr> 
          <th>
                  {{ $pro->proj_name }}
          </th>

          <th>
                  {{ $pro->proj_desc }}
          </th>

          <th>
            {{ date('d F Y', strtotime($pro->start_date)) }}
          </th>

          <th>
            {{ date('d F Y', strtotime($pro->end_date)) }}
          </th>

          <th>
            <button type="submit"><a href="{{route('projects.edit', $pro)}}">Edit</a></button>
          </th>

          <th>
            <button type="submit"><a href="{{route('projects.destroy', $pro)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?');">Delete</button>
          </th>

          <th>
            <button type="submit"><a href="{{route('backlog.index', $pro->id)}}">View</a></button>
          </th>

          <th>
            <button type="submit"><a href="{{action('ProductFeatureController@index2', $pro['proj_name'])}}">View</button>
        </th>
      </tr>


@endforeach

@endif

  </table>
  <br><br><br>

  {{-- <button type="submit"><a href="{{route('projects.create')}}">Add Project</a></button> --}}

@endsection
