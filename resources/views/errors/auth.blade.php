@if (count($errors) > 0)
    <div class="alert alert-danger">
        {!! _('alert.auth.error') !!}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif