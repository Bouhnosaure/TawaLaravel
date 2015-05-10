@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1>{{ trans('confirmation.confirmation') }}</h1>
        </div>
    </div>

    <hr/>

    <div class="row">

        <table class="table">
            <thead>
            <tr>
                <th>{{ trans('confirmation.type') }}</th>
                <th>{{ trans('confirmation.is_confirmed') }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ trans('confirmation.mail') }}</td>
                @if($user->mail_confirmed)
                    <td class="success">{{ trans('confirmation.is_valid') }}</td>
                @else
                    <td class="danger">
                        {{ trans('confirmation.is_not_valid') }}
                        <a href="{{action('Auth\ConfirmationController@send',['type' => 'mail' ])}}">
                            {{ trans('confirmation.send-confirmation') }}
                        </a>
                    </td>
                @endif
            </tr>
            <tr>
                <td>{{ trans('confirmation.phone') }}</td>
                @if($user->phone_confirmed)
                    <td class="success">{{ trans('confirmation.is_valid') }}</td>
                @else
                    <td class="danger">
                        {{ trans('confirmation.is_not_valid') }}
                        <a href="{{action('Auth\ConfirmationController@send',['type' => 'phone' ])}}">
                            {{ trans('confirmation.send-confirmation') }}
                        </a>
                    </td>
                @endif
            </tr>
            </tbody>
        </table>
    </div>

@stop


