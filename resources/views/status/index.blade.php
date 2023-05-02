@extends('layouts.app2')
@include('inc.style')
@include('inc.dashboard')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
    <table>
    <tr>
        <th>Project</th>
        <th>Status</th>
    </tr>
    @forelse($pros as $pro)
        <tr> 
            <th>
                {{ $pro->proj_name}}
            </th>
            <th>
                <button type="submit"> <a href="{{ action('StatusController@indexProjectStatus', $pro['id']) }}">View</button>
            </th>
        </tr>
    @empty
    <tr>
        <td colspan="2">No existing projects yet</td>
    </tr>
    @endforelse
    </table>
  <br><br>
@endsection

