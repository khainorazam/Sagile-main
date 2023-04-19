@extends('layouts.app2')



@include('inc.style')

@section('dashboard')
                     
@endsection

@section('content')



<br><br>

    <div class="container mt-5">
        <form action="{{route('attachment.fileUpload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File in Laravel</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </div>

@endsection