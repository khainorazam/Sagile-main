<!--Home Page after Login-->
@extends('layouts.app2')

@include('inc.dashboard')
@include('inc.navbar')

@section('article')
    <button><a href="{{route('projects.create')}}">New Project</a></button>
@endsection    

