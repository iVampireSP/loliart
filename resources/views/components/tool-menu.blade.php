<ul class="mdui-menu @if (!Agent::isMobile()) mdui-menu-cascade @endif" id="app-menu" style="border-radius: 10px">
    @auth
        <li class="mdui-divider"></li>
        <li class="mdui-menu-item">
            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="mdui-ripple">
                <i class="mdui-menu-item-icon mdui-icon material-icons-outlined">logout</i>
                {{ tr('Log out') }}</a>
        </li>
    @endauth
</ul>


<form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
    @csrf
</form>
