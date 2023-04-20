<!-- Status for Specific Project Page -->
@extends('layouts.app2')
@include('inc.style')
@include('inc.dashboard')
@include('inc.navbar')
@include('inc.success')

@section('content')
@include('inc.title')
<br>
    <table>
    <tr>
        <th>Status</th>
        <th>Delete</th>
    </tr>
    @foreach($statuses as $status)
        <tr> 
            <th>
                {{ $status->title}}
            </th>
            <th>
                <button type="submit"><a href="{{route('statuses.destroy', $status)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this status?');">Delete</button>
            </th>
        </tr>
    @endforeach
    </table>
  <br><br>

  <button type="submit"><a href="{{route('statuses.create', $project['id'])}}">Add Status</a></button>

@endsection

