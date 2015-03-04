<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var App = new $.App('{{ LaravelLocalization::getCurrentLocale() }}');
        App.datetimepicker_event();
        App.googlemaps_autocomplete('location');
    });
</script>