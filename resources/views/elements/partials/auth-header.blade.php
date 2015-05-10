<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li>
            <a href="{{action('Auth\AuthController@getLogin')}}">{{ trans('auth.login') }}</a>
        </li>
        <li>
            <a href="{{action('Auth\AuthController@getRegister')}}">{{ trans('auth.register') }}</a>
        </li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->username }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{action('UsersController@index')}}">{{ trans('menu.dashboard') }}</a>
                </li>
                <li>
                    <a href="{{action('UsersController@edit')}}">{{ trans('menu.preferences') }}</a>
                </li>
                <li>
                    <a href="{{action('Auth\ConfirmationController@index')}}">{{ trans('menu.confirmation') }}</a>
                </li>
                <li>
                    <a href="{{action('Auth\AuthController@getLogout')}}">{{ trans('auth.logout') }}</a>
                </li>
            </ul>
        </li>
    @endif
</ul>