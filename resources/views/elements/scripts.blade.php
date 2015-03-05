<!-- all app js-->
<script src="{{ elixir("js/app.js") }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var App = new $.App('{{ LaravelLocalization::getCurrentLocale() }}');
        App.enable_flash_modal();
    });
</script>

@yield('scripts')