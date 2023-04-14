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

@section('content')



<br><br><br>

<table>

<tr>
    <th>File</th>
    <th>View</th>
    <th>Delete</th>

</tr>

@foreach($attachments as $attachment)

      <tr> 
          <th>
                  {{ $attachment->filename }}
          </th>

           <th>
              <button type="submit"><a href="{{action('AttachmentController@index', $attachment['filename'])}}">View</button>
          </th>

          <th>
              <button type="submit"><a href="{{route('attachments.destroy', $attachment)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete</button>
          </th>
          
      </tr>

@endforeach

  </table>
  <br><br><br>

  <button type="submit"><a href="{{route('attachment.createForm')}}">Upload File</a></button>


@endsection