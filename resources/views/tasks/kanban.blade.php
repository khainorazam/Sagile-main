<!--Kanban Board-->
@extends('layouts.app')

@section('content')

<div class="md:mx-4 relative overflow-hidden">
    <main class="h-full flex flex-col overflow-auto">
        <kanban-board :initial-data="{{ $tasks }}" :sprint="{{$sprints}}" :userstory="{{$userstories}}">
        </kanban-board>
        <!-- addtask-form :sprint="{{$sprints}}" :userstory="{{$userstories}}"></addtask-form>
        -->
    </main>
</div>
@endsection



