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

@section('dashboard')


                     
@endsection

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
<br><br><br>


<table>

<tr>
    <th>Status</th>
    <th>Slug</th>
    <th>Order</th>
    <th>Edit</th>
    <th>Delete</th>

</tr>

@foreach($statuses as $status)

      <tr> 
          <th>
                  {{ $status->title}}
          </th>

          <th>
                  {{ $status->slug}}
          </th>

          <th>
                  {{ $status->order}}
          </th>

          

          <th>
              <button type="submit"><a href="{{action('StatusController@edit', $status['id'])}}">Edit</a></button>
              
          </th>

          <th>
              <button type="submit"><a href="{{route('statuses.destroy', $status)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete</button>
          </th>
          
      </tr>

@endforeach

  </table>
  <br><br><br>

  <button type="submit"><a href="{{route('statuses.create')}}">Add Status</a></button>

@endsection

