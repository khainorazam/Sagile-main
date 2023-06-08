@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Edit Feedback</h5>
            </div>
            <form method="post" action="{{route('feedback.update' , collect($feedback)->first())}}" autocomplete="off">
                <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        <div class="card">
                        <div class="card-body">
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Comments" value="Comments" @if ($feedback->feedback_type == "Comments")checked @endif > Comments
        <span class="form-check-sign"></span>
      </label>
    </div>
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Suggestions" value="Suggestions" @if ($feedback->feedback_type == "Suggestions")checked @endif> Suggestions
        <span class="form-check-sign"></span>
      </label>
    </div>
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Questions" value="Questions" @if ($feedback->feedback_type == "Questions")checked @endif> Questions
        <span class="form-check-sign"></span>
      </label>
    </div>
  </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Describe Your Feedback</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$feedback->description}}</textarea>
                         </div>

                        <div class="form-group">
                            <label>{{ _('Name') }}</label>
                            <input type="text" name="name" class="form-control" placeholder="{{ _('Name') }}" value="{{$feedback->name}}" >
                        </div>

                        <div class="form-group">
                            <label>{{ _('Email') }}</label>
                            <input type="text" name="email" class="form-control" placeholder="{{ _('Email') }}" value="{{$feedback->email}}">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection
