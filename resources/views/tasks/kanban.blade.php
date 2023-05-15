<!--Kanban Board-->
@extends('layouts.app')

@section('content')

<div class="md:mx-4 relative overflow-hidden">
    <main class="h-full flex flex-col overflow-auto">
        <kanban-board :tasks="{{ $tasks }}" :statuses="{{$statuses}}"></kanban-board>
    </main>
</div>
@endsection



