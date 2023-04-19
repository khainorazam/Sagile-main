@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>

   <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
      @csrf

      Role Name :<input type="text" name="role_name" style="margin-left:2.5em">
      <div class="error"><font color="red" size="2">{{ $errors->first('role_name') }}</p></font></div>
      <br>

      <button type="submit">Add Role</button>
   </form>

 <br><br>
@endsection