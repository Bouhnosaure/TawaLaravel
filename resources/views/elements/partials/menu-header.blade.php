<ul class="nav navbar-nav">
    <li>
        <a href="{{action('PagesController@about')}}">{{ trans('menu.about') }}</a>
    </li>
    <li>
        <a href="{{action('EventsController@index')}}">{{ trans('menu.events') }}</a>
    </li>
</ul>