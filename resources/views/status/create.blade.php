@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br><br>
   <form action="{{route('statuses.store')}}" method="post" enctype="multipart/form-data">
   @csrf

      Status Name:<input type="text" name="title" style="margin-left:2.5em">
      <div class="error"><font color="red" size="2">{{ $errors->first('title') }}</p></font></div>
      <br>

      <input type="hidden" name="project_id" value="{{ $project->id }}">


      <button type="submit">Add Status</button>
   </form>
 <br>

@endsection