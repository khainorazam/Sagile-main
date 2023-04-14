@section('dashboard')
@foreach($pros as $pro)
        <li>
            <a href="{{ action('ProductFeatureController@index2', $pro['proj_name']) }}">
             {{ $pro->proj_name }} 
            </a>
        </li>
@endforeach    
@endsection