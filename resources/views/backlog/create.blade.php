@extends ('layouts.app1')

@section('article')
    <li>
       < class="aside a"><a href="{{route('tasks.index')}}">Assign Task</a></li>
        
        <li class="aside a"><a href="#contact">User Stories</a></li>
        <li class="aside a"><a href="#contact">Logout</a></li>
    </ul>
@endsection 

@section ('content')
<br><br><br>
<table>
        <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User Story</th>
                <th>Description</th>
                <th><button type="submit"><a href="{{route('backlogs.edit')}}">Edit</a></button></th>
        </tr>
</table>
<form action="{{route('backlogs.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @csrf
        
    Sprint Name :<input type="text" name="userstory_name" style="margin-left:2.5em" >
    <br><br><br>
    Description :<input type="text" name="sprint_desc" style="margin-left:2.6em" >
    <br><br><br>
    Start Date :<input type="date" name="start_sprint" style="margin-left:2.6em" >
    <br><br><br>
    Completion Date :<input type="date" name="end_sprint" style="margin-left:2.6em" >
    <br><br><br>
    
    
        <button type="submit">Add Sprint</button>
        
    <br><br><br>
@endsection
