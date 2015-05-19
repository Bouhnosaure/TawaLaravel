<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ _('menu.language') }}<span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            @foreach(Config::get('laravel-gettext.supported-locales') as $locale)
                <li><a href="/lang/{{$locale}}">{{$locale}}</a></li>
            @endforeach
        </ul>
    </li>

</ul>
