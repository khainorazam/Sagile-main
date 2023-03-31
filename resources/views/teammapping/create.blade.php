@extends('layouts.app2')

@section('navbar')
@if ($role_name == 'Admin')
    @include('inc.navbar')

@elseif ($role_name == 'Project Manager')
    @include('inc.navprojectmanager')

@elseif ($role_name == 'Product Owner')
    @include('inc.navproductowner')

@elseif ($role_name == 'Scrum Master')
    @include('inc.navscrummaster')

@elseif ($role_name == 'Developer')
    @include('inc.navdeveloper')
@endif
@endsection

@section('content')
@foreach($teammappings as $teammapping)
@endforeach

<form action="{{route('teammappings.store', $teammapping->team_name)}}" method="post" enctype="multipart/form-data">
@csrf

<meta name="csrf-token" content="{{ csrf_token() }}">
<br><br><br>


   <div >
      <div >
      <label for="title">Select Role:</label>
        <select name="role" id="role" class="form-control">
            <option value="" selected="false">Select</option>
                @foreach($roles as $role)
                    <option value="{{ $role->role_name}}"> {{ $role->role_name}}</option>
                @endforeach
        </select> 
      </div>

<br><br>

      <div class="form-group">
                <label for="title">Select User:</label>
                <select name="user" class="form-control" style="width:350px">
                </select>
            </div>
<div id="nav"></div>

<br><br>
Team Name :<input type="text" name="team_name" style="margin-left:2.5em" value="{{$teammapping->team_name}}">




<br><br><br>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
  

$(document).ready(function() {
        $('select[name="role"]').on('change', function(e) {
            
    e.preventDefault();
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // $.ajaxSetup({
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // }
        // });

        var role = $("select[name=role]").val();
        
        $.ajax({
           
           url:"{{ route('getUsers.post') }}",
           type:'POST',
           data:{role:role, _token: '{{csrf_token()}}'},
           
          
           success:function(data){
                
                var datas = data;
                // datas = '<div>';
              //  $("#nav").html(datas);

               console.log(data);
                  $('select[name="user"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="user"]').append('<option value="'+ value.username +'">'+ value.username +'</option>');
                    });


           },
           fail:function(err){
               console.log(err);
           }
        })
  });
});
</script>

   </div>

 <br>
 <button type="submit">Add Team Member</button>

 <br><br>
@endsection