@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Create Feedback</h5>
            </div>
            <form method="post" action="{{ route('feedback.store') }}" autocomplete="off">
                <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        <div class="card">
                        <div class="card-body">
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Comments" value="Comments"> Comments
        <span class="form-check-sign"></span>
      </label>
    </div>
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Suggestions" value="Suggestions"> Suggestions
        <span class="form-check-sign"></span>
      </label>
    </div>
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Questions" value="Questions"> Questions
        <span class="form-check-sign"></span>
      </label>
    </div>
  </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Describe Your Feedback</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                         </div>

                        <div class="form-group">
                            <label>{{ _('Name') }}</label>
                            <input type="text" name="name" class="form-control" placeholder="{{ _('Name') }}" >
                        </div>

                        <div class="form-group">
                            <label>{{ _('Email') }}</label>
                            <input type="text" name="email" class="form-control" placeholder="{{ _('Email') }}" >
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
