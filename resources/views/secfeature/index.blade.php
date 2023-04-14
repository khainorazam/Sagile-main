<!--Main Security Feature Page-->
@extends('layouts.app2')
@include('inc.success')
@include('inc.style')

@include('inc.dashboard')
@section('navbar')
  @include('inc.navbar')
@endsection

@section('content')
@include('inc.title')
<br>
  <table>
  <tr>
      <th>Feature</th>
      <th>Description</th>
      <th>Edit</th>
      <th>Delete</th>
  </tr>

  @forelse($secfeatures as $secfeature)
  <tr> 
      <th>
        {{ $secfeature->secfeature_name }}
      </th>

      <th>
        {{ $secfeature->secfeature_desc }}
      </th>

      <th>
        <button type="submit"><a href="{{route('secfeature.edit', $secfeature)}}">Edit</a></button>
      </th>

      <th>
        <button type="submit" method="post"><a href="{{route('secfeature.destroy', $secfeature['secfeature_id'])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Security Feature?');">Delete</button>
      </th> 

  </tr>
  @empty
  <tr>
      <td colspan="4">No security feature added yet</td>
  </tr>

  @endforelse
  </table>
<br><br><br>

  <button type="submit"><a href="{{route('secfeature.create')}}">Add Security Feature</a></button>

@endsection