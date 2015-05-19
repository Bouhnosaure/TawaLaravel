<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li>
            <a href="{{action('Auth\AuthController@getLogin')}}">{{ _('menu.auth.login') }}</a>
        </li>
        <li>
            <a href="{{action('Auth\AuthController@getRegister')}}">{{ _('menu.auth.register') }}</a>
        </li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{action('UsersController@index')}}">{{ _('menu.dashboard') }}</a>
                </li>
                <li>
                    <a href="{{action('UsersController@carpoolings')}}">{{ _('menu.user-carpoolings') }}</a>
                </li>
                <li>
                    <a href="{{action('UsersController@events')}}">{{ _('menu.user-events') }}</a>
                </li>
                <li>
                    <a href="{{action('ProfileController@edit')}}">{{ _('menu.preferences') }}</a>
                </li>
                <li>
                    <a href="{{action('Auth\ConfirmationController@index')}}">{{ _('menu.confirmation') }}</a>
                </li>
                <li>
                    <a href="{{action('Auth\AuthController@getLogout')}}">{{ _('menu.auth.logout') }}</a>
                </li>
            </ul>
        </li>
    @endif
</ul>