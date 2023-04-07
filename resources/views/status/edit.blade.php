@extends('layouts.app2')



<style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
</style>

@section('navbar')
    @include('inc.navbar')
@endsection

@section('content')

<br><br><br>
<form action="{{route('statuses.update', $status)}}" method="post">
        @csrf
        
Title :<input type="text" name="title" style="margin-left:2.5em" value="{{$status->title}}">
<br><br><br>

Slug :<input type="text" name="slug" style="margin-left:2.5em" value="{{$status->slug}}">
<br><br><br>

Order :<input type="text" name="order" style="margin-left:2.5em" value="{{$status->order}}">
<br><br><br>

User ID :<input type="text" name="user_id" style="margin-left:2.5em" value="{{$status->user_id}}">
<br><br><br>
 
    
        <button type="submit" method="post">Update</button>
        
        <button type="submit", formaction="{{route('statuses.destroy', $status)}}", method="delete">Delete</button>
        </form>
    
    <br><br><br>
@endsection