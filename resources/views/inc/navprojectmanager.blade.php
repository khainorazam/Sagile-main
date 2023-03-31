<!--Project Manager NavBar -->
<?php
$role_name = 'Project Manager'
?>

<ul>            
    <li class="aside a"><a href="{{route('profeature.index')}}">Project List</a></li>
    <li class="aside a"><a href="{{route('team.index')}}">Team</a></li>
    <li class="aside a"><a href="{{route('role.index')}}">Role</a></li>
    <li class="aside a"><a href="{{url('/logout')}}">Logout</a></li>
</ul>