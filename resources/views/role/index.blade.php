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
        <th>Role Name</th>
        <th>Delete</th>
    </tr>
    @foreach($roles as $role)
          <tr> 
              <th>
                {{ $role->role_name }}
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

