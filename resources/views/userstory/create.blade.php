<!--Create User Story Page-->
@extends('layouts.app2')

@include('inc.style')

@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>
<form action="{{route('userstory.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Sprint Name Value -->
    <input type="hidden" name="sprint_id" value="{{ $sprint_id }}"> 


    User Story Name :<input type="text" name="user_story" style="margin-left:2.5em" >
    <div class="error"><font color="red" size="2">{{ $errors->first('user_story') }}</p></font></div>
    <br>

    Description :<input type="text" name="desc_story" style="margin-left:2.6em" >
    <div class="error"><font color="red" size="2">{{ $errors->first('desc_story') }}</p></font></div>
    <br>
    
    {{-- Priority : 
    <select name="prio_story">
    @foreach($prios as $prio)
        <option value="{{ $prio->prio_name}}" {{ ((isset($prio->prio_name) && $prio->prio_name== $prio->prio_name)? "selected":"") }}>{{$prio->prio_name}}</option>
    @endforeach
    </select>

    <br><br><br> --}}
    <div>
        <label for="title">Status :</label>
        <select name="title" id="title" class="form-control">
            <option value="" selected disabled>Select</option>
            @foreach($statuses as $statuses)
                <option value="{{ $statuses->title }}"> {{ $statuses->title }}</option>
            @endforeach
        </select> 
        <div class="error"><font color="red" size="2">{{ $errors->first('title') }}</p></font></div>
    </div>

    {{-- Status : <select name="title">
        @foreach($statuses as $statuses)
            <option value="{{ $statuses->title}}" {{ ((isset($statuses->title) && $statuses->title== $statuses->title)? "selected":"") }}>{{$statuses->title}}</option>
        @endforeach
    </select> --}}
    <br>
    
    <div>
        <label for="secfeatures">Security Features:</label>
        <br><br>
        @foreach($secfeatures as $secfeature)
            <label class="checkbox-inline">
                <input type="checkbox" id="secfeature_id" name="secfeature_id[]" value="{{ $secfeature->secfeature_name }}"> {{ $secfeature->secfeature_name }}
            </label>
        @endforeach
        <br><br><br>
    </div>

    <div>
        <label for="perfeatures">Performance Features:</label>
        <br><br>
        @foreach($perfeatures as $perfeature)
            <label class="checkbox-inline">
                <input type="checkbox" id="perfeature_id" name="perfeature_id[]" value="{{ $perfeature->perfeature_name }}"> {{ $perfeature->perfeature_name }}
            </label>
        @endforeach
        <br><br><br>
    </div>

    <button type="submit">Add User Story</button>
   
    </form>
    <br><br><br>
@endsection
