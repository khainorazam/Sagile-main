@extends('layouts.app2')
@include('inc.success')
@include('inc.style')
@include('inc.dashboard')
@include('inc.navbar')

@section('content')
@include('inc.title')
<br>
    <table>
    <tr>
        <th>Feature Name</th>
        {{-- <th>Edit</th> --}}
        <th>Delete</th>
    </tr>

    @forelse($perfeatures as $perfeature)
    <tr> 
        <th>
            {{ $perfeature->perfeature_name }}
        </th>

        {{-- <th>
            <button type="submit"><a href="{{route('perfeature.edit', $perfeature)}}">Edit</a></button>

        </th> --}}

        <th>
            <button type="submit" method="post"><a href="{{action('PerformanceFeatureController@destroy', $perfeature['perfeature_id'])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Performance Feature?');">Delete</button>
        </th>

    </tr>
    @empty
    <tr>
        <td colspan="2">No performance feature added yet</td>
    </tr>

    @endforelse
    </table>
<br><br><br>

<button type="submit"><a href="{{route('perfeature.create')}}">Add Performance Feature</a></button>

@endsection