<!--NavBar 
The navbar will retrieve the current url of the page and highlight the navbar based on which url we are one
E.g.: 
    If we are in a url that contains team, it will highlight team
-->
@section('navbar')
<ul style="display: flex; justify-content: space-between; align-items: center; list-style-type: none; margin: 0; padding: 0;">            
    <li class="aside a {{ Request::is('profeature*') || Request::is('projects*') || Request::is('sprint*') || Request::is('userstory*') ? 'active' : '' }}"><a href="{{ route('profeature.index') }}">Project List</a></li>
    <li class="aside a {{ Request::is('team*') ? 'active' : '' }}"><a href="{{route('team.index')}}">Team</a></li>
    <li class="aside a {{ Request::is('status*') ? 'active' : '' }}"><a href="{{route('status.index')}}">Status</a></li>
    <li class="aside a {{ Request::is('tasks*') ? 'active' : '' }}"><a href="{{route('tasks.index')}}">Kanban Board</a></li>
    <li class="aside a {{ Request::is('perfeature*') ? 'active' : '' }}"><a href="{{route('perfeature.index')}}">Performance Feature</a></li>
    <li class="aside a {{ Request::is('secfeature*') ? 'active' : '' }}"><a href="{{route('secfeature.index')}}">Security Feature</a></li>
    <li class="aside a {{ Request::is('codestand*') ? 'active' : '' }}"><a href="{{route('codestand.index')}}">Coding Standard</a></li>
    <li class="aside a {{ Request::is('role*') ? 'active' : '' }}"><a href="{{route('role.index')}}">Role</a></li>
    <li class="aside a" style="margin-left: auto; color: white;"><span>{{ Auth::user()->name }}</span></li>
    <li class="aside a"><a href="{{url('/logout')}}">Logout</a></li>
</ul>
@endsection