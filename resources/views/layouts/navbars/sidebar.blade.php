<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">{{ _('Project Management Tools') }}</a>
            <div class="text-center">
                <label class="switch">
                    <input type="checkbox" id="toggle-color" onclick="changeBackground()">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        @php
            $projects = \App\Models\Project::get();
        @endphp
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-notes" ></i>
                    <span class="nav-link-text" >{{ __('Project List') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        @foreach ($projects as $project)
                        <li @if ($pageSlug == 'dashboard') class="active " @endif>
                            <a href="{{ route('project.select', $project->id) }}">
                                <i class="tim-icons icon-app"></i>
                                <p>{{ $project->proj_name }}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('feedback.index') }}">
                    <i class="tim-icons icon-pencil"></i>
                    <p>{{ _('Feedback') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
