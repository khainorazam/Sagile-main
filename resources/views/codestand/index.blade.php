<!--Coding Standard Index-->

@extends('layouts.app2')
@include('inc.success')
@include('inc.style')

@include('inc.dashboard')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
  <table>
  <tr>
      <th>Coding Standard</th>
      <th>Edit</th>
      <th>Delete</th>
      
  </tr>

  @forelse($codestands as $codestand)
  <tr> 
      <th>
        {{ $codestand->codestand_name }}
      </th>

      <th>
          <button type="submit"><a href="{{route('codestand.edit', $codestand)}}">Edit</a></button>
      </th>

      <th>
          <button type="submit"><a href="{{route('codestand.destroy', $codestand)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Coding Standard?');">Delete</button>
      </th>

  </tr>
  @empty
  <tr>
    <td colspan="3">No coding standard added yet</td>
  </tr>

  @endforelse
  </table>
  <br><br><br>

  <button type="submit"><a href="{{route('codestand.create')}}">Add Coding Standard</a></button>

@endsection