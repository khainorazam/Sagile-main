@extends('layouts.app2')

@section('dashboard')

@foreach($teammappings as $teammapping)
        <li>
            <a href="{{ route('teammappings.edit', [$teammapping]) }}">
             {{ $teammapping->team_name }} 
            </a>
                     
        </li>
@endforeach
@endsection

@section('content')

<br><br><br>
<form action="{{route('teammappings.update', $teammapping)}}">
        @csrf
        
 Team Name :<input type="text" name="team_name" style="margin-left:2.5em" value="{{$teammapping->team_name}}">
<br><br><br>

 
        <button type="submit" method="post">Update</button>
        
        <button type="submit", formaction="{{route('teammappings.destroy', $teammapping)}}", method="delete">Delete</button>
        </form>
    
    <br><br><br>
@endsection