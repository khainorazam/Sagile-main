<div class="text-center">
    <h1>Project Management Tools</h1>
</div> 

@if (Route::current()->getName() != 'dashboard' && Route::current()->getName() != 'feedback.index' && Route::current()->getName() != 'feedback.create' && Route::current()->getName() != 'feedback.edit')
<nav class="navbar navbar-expand-lg navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper d-none">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            @if (isset($project_id))
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" href="{{route('project.select',['id'=>$project_id])}}">{{ __('Project List') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('sprint.select',['id'=>$project_id])}}">{{ __('Sprint') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('task.select',['id'=>$project_id])}}">{{ __('Task') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('userstory.select',['id'=>$project_id])}}">{{ __('User Stories') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('team.select',['id'=>$project_id])}}">{{ __('Team') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('status.select',['id'=>$project_id])}}">{{ __('Status') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('kb.select',['id'=>$project_id])}}">{{ __('Kanban Board') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('perfeature.select',['id'=>$project_id])}}">{{ __('Performance Feature') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('secfeature.select',['id'=>$project_id])}}">{{ __('Security Feature') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('codestand.select',['id'=>$project_id])}}">{{ __('Coding Standard') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('role.select',['id'=>$project_id])}}">{{ __('Role') }}</a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav">
                <li>
                    <a href="{{route('project.index')}}">{{ __('Project List') }}</a>
                </li>
                <li>
                    <a href="{{route('sprint.index')}}">{{ __('Sprint') }}</a>
                </li>
                <li>
                    <a href="{{route('task.index')}}">{{ __('Task') }}</a>
                </li>
                <li>
                    <a href="{{route('userstory.index')}}">{{ __('User Stories') }}</a>
                </li>
                <li>
                    <a href="{{route('team.index')}}">{{ __('Team') }}</a>
                </li>
                <li>
                    <a href="{{route('status.index')}}">{{ __('Status') }}</a>
                </li>
                <li>
                    <a href="{{route('kb.index')}}">{{ __('Kanban Board') }}</a>
                </li>
                <li>
                    <a href="{{route('perfeature.index')}}">{{ __('Performance Feature') }}</a>
                </li>
                <li>
                    <a href="{{route('secfeature.index')}}">{{ __('Security Feature') }}</a>
                </li>
                <li>
                    <a href="{{route('codestand.index')}}">{{ __('Coding Standard') }}</a>
                </li>
                <li>
                    <a href="{{route('role.index')}}">{{ __('Role') }}</a>
                </li>
            </ul>
            @endif
            
            <ul class="navbar-nav ml-auto">
                
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{ asset('white') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">{{ __('Log out') }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Settings') }}</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
@endif
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
        </div>
    </div>
</div>
