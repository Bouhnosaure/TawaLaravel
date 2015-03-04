<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li>
            <a href="/auth/login">{{ trans('auth.login') }}</a>
        </li>
        <li>
            <a href="/auth/register">{{ trans('auth.register') }}</a>
        </li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="/auth/logout">{{ trans('auth.logout') }}</a>
                </li>
            </ul>
        </li>
    @endif
</ul>