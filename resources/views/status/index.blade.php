@extends('layouts.app2')



@include('inc.style')

@section('dashboard')


                     
@endsection

@include('inc.navbar')

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

