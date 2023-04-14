<!--NavBar -->
<ul style="display: flex; justify-content: space-between; align-items: center; list-style-type: none; margin: 0; padding: 0;">            
    <li class="aside a"><a href="{{route('profeature.index')}}">Project List</a></li>
    <li class="aside a"><a href="{{route('team.index')}}">Team</a></li>
    <li class="aside a"><a href="{{route('status.index')}}">Status</a></li>
    <li class="aside a"><a href="{{route('tasks.index')}}">Kanban Board</a><li>
    <li class="aside a"><a href="{{route('perfeature.index')}}">Performance Feature</a></li>
    <li class="aside a"><a href="{{route('secfeature.index')}}">Security Feature</a></li>
    <li class="aside a"><a href="{{route('codestand.index')}}">Coding Standard</a></li>
    <li class="aside a"><a href="{{route('role.index')}}">Role</a></li>
    <li class="aside a" style="margin-left: auto; color: white;" ><span>{{ Auth::user()->name }}</span></li>
    <li class="aside a"><a href="{{url('/logout')}}">Logout</a></li>
</ul>