<ul class="nav navbar-nav">
    <li>
        <a href="{{action('EventsController@index')}}">{{ _('menu.events') }}</a>
    </li>
    <li>
        <a href="{{action('CarpoolingsController@index')}}">{{ _('menu.carpoolings') }}</a>
    </li>
    <li>
        <a href="{{action('PagesController@about')}}">{{ _('menu.about') }}</a>
    </li>
</ul>