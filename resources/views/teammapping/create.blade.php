@extends('layouts.app2')

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')

<form action="{{route('teammappings.store')}}" method="post" enctype="multipart/form-data">
@csrf

<meta name="csrf-token" content="{{ csrf_token() }}">
<br><br><br>

    <div class="form-group">
        <label for="title">User:</label>
        <select name="username" id="username" class="form-control">
            <option value="" selected="false">Select</option>
                @foreach($users as $user)
                    <option value="{{ $user->username}}"> {{ $user->username}}</option>
                @endforeach
        </select> 
    </div>
<br><br>
    <div>
        <label for="title">Role:</label>
        <select name="role" id="role" class="form-control">
            <option value="" selected="false">Select</option>
                @foreach($roles as $role)
                    <option value="{{ $role->role_name}}"> {{ $role->role_name}}</option>
                @endforeach
        </select> 
    </div>

    <input type="hidden" name="team_name" value="{{ $team_name }}">

<br><br><br><br>

 <button type="submit">Add Team Member</button>

 <br><br>
@endsection