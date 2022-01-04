@extends('layouts.app2')



@section('content')

<br><br><br>
<form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
@csrf

 Role Name :<input type="text" name="role_name" style="margin-left:2.5em">

    <div class="error"><font color="red" size="2">{{ $errors->first('role_name') }}</p></font></div>
    <br><br><br>

 <button type="submit">Add Role</button>
 <button type="submit"><a href="{{route('role.index')}}">Cancel</a></button>
 <br><br><br>

@endsection