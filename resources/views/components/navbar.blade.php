@auth
<ul class="navbar-nav mr-auto">
    <li class="nav-item @if($active === 'chores') active @endif"><a href="\chores" title="Chores Link" class="nav-link">Chores</a></li>
    <li class="nav-item @if($active === 'digest') active @endif"><a href="\digest\day" title="Chores Link" class="nav-link">Digest</a></li>
</ul>
@endauth
