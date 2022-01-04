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



@section('content')

<br><br><br>
<form action="{{route('roles.update', $role)}}" method="post">
        @csrf
        
Role Name :<input type="text" name="role_name" style="margin-left:2.5em" value="{{$role->role_name}}">
<br><br><br>
 
    
        <button type="submit" method="post">Update</button>
        
        <button type="submit", formaction="{{route('roles.destroy', $role)}}", method="delete">Delete</button>
        </form>
    
    <br><br><br>
@endsection