@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1>{{ _('title.confirmation.confirmation') }}</h1>
        </div>
    </div>

    <hr/>

    <div class="row">

        <table class="table">
            <thead>
            <tr>
                <th>{{ _('label.confirmation.type') }}</th>
                <th>{{ _('label.confirmation.is_confirmed') }}</th>
                <th>{{ _('label.confirmation.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @if(Config::get('confirmation.mail'))
                <tr>
                    <td>{{ _('label.confirmation.mail') }}</td>
                    @if($user->profile->mail_confirmed)
                        <td>{{ _('label.confirmation.is_valid') }}</td>
                        <td>{{ _('label.confirmation.is_valid') }}</td>
                    @else
                        <td>
                            {{ _('label.confirmation.is_not_valid') }}
                        </td>
                        <td>
                            <a class="btn btn-primary" id="submit-mail-code"
                               href="{{action('Auth\ConfirmationController@send',['type' => 'mail' ])}}">
                                {{ _('button.confirmation.send-confirmation') }}
                            </a>
                        </td>
                    @endif
                </tr>
            @endif

            @if(Config::get('confirmation.phone'))
                <tr>
                    <td>{{ _('label.confirmation.phone') }}</td>
                    @if($user->profile->phone_confirmed)
                        <td>{{ _('label.confirmation.is_valid') }}</td>
                        <td>{{ _('label.confirmation.is_valid') }}</td>
                    @else
                        <td>
                            {{ _('label.confirmation.is_not_valid') }}
                        </td>
                        <td>
                            <a class="btn btn-primary" id="submit-phone-code"
                               href="{{action('Auth\ConfirmationController@send',['type' => 'phone' ])}}">
                                {{ _('button.confirmation.send-confirmation') }}
                            </a>
                        </td>
                    @endif
                </tr>
            @endif
            </tbody>
        </table>
    </div>

@stop


