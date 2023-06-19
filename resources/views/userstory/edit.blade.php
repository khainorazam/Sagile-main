@extends('layouts.app2')
@section('dashboard')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
<form action="{{route('userstory.update', $userstory)}}" method="post" >
    @csrf

    User Story :<input type="text" name="user_story" id="user_story" readonly value="{{$userstory->user_story}}" style="margin-left:2.5em; width: 1000px; height:50px"  >
    <div class="error"><font color="red" size="2">{{ $errors->first('user_story') }}</p></font></div>
    <br>
  
    {{-- Means :<input type="text" name="means" style="margin-left:2.6em" value="">
    <div class="error"><font color="red" size="2">{{ $errors->first('means') }}</p></font></div>
    <br>

    Ends :<input type="text" name="ends" id="ends" style="margin-left:2.6em" value="" onchange="updateUserStory()">
    <div class="error"><font color="red" size="2">{{ $errors->first('ends') }}</p></font></div>
    <br><br>

    <div>
        <label for="role">Role :</label>
        <select name="role" id="role" class="form-control" onchange="updateUserStory()">
            <option value="" selected disabled>Select</option>
            @foreach($roles as $role)
                <option value="{{ $role }}"> {{ $role }}</option>
            @endforeach
        </select> 
        <div class="error"><font color="red" size="2">{{ $errors->first('role') }}</p></font></div>
    </div>
    <br> --}}
    

    {{-- Priority : <textarea id ="prio_story" rows = "2" cols = "100" name="prio_story">{{old('prio_story',$userstory->prio_story)}}</textarea> --}}
    {{-- <select name="prio_story">
        @foreach($prios as $prio)
        <option value="{{ $prio->prio_name}}" {{ ((isset($prio->prio_name) && $prio->prio_name== $prio->prio_name)? "selected":"") }}>{{$prio->prio_name}}</option>
        @endforeach
    </select> --}}


    <div>
        <label for="title">Status :</label>
        <select name="title" id="title" class="form-control">
            <option value="" selected disabled>Select</option>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}" @if($userstory->title == $status->id) selected @endif> {{ $status->title }}</option>
            @endforeach
        </select>
        <div class="error"><font color="red" size="2">{{ $errors->first('title') }}</font></div>
    </div>
    
    
    <br><br>
    
    <!--If the perfeature_id and secfeature_id does not contain anything, it will store as the string 'null'
                This condition here displays 'an empty array if the features are empty'
                The false condition is displaying the features if it is not empty-->  
    <div>
        <label for="secfeatures">Security Features:</label>
        <br><br>
        @foreach($secfeatures as $secfeature)
            <label class="checkbox-inline">
                <input type="checkbox" id="secfeature_id" name="secfeature_id[]" value="{{$secfeature->secfeature_name}}" @if(in_array($secfeature->secfeature_name, json_decode($userstory->secfeature_id == 'null' ? '[]' : $userstory->secfeature_id ))) checked @endif> {{$secfeature->secfeature_name}}
            </label>
        @endforeach
        <br><br><br>
    </div>

    <div>
        <label for="perfeatures">Performance Features:</label>
        <br><br>
        @foreach($perfeatures as $perfeature)
            <label class="checkbox-inline">
                <input type="checkbox" id="perfeature_id" name="perfeature_id[]" value="{{$perfeature->perfeature_name}}" @if(in_array($perfeature->perfeature_name, json_decode($userstory->perfeature_id == 'null' ? '[]' : $userstory->perfeature_id ))) checked @endif> {{$perfeature->perfeature_name}}
            </label>
        @endforeach
        <br><br><br>
    </div>

    <button type="submit">Update</button>
    </form> 
    <br><br><br>

@endsection
