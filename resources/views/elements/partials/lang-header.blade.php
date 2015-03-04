<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ trans('general.lang') }}<span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                        {{{ $properties['native'] }}}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>

</ul>
