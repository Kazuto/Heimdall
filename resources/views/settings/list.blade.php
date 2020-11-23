@extends('layouts.app')

@section('content')

@foreach ($groups as $group)
<div class="card @if(!$loop->last) mb--4 @endif">
    <header class="card__header">
        <div class="card__title">
            {{ __($group->title) }}
        </div>
    </header>

    <div class="card__body card__body--flush">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('app.settings.label') }}</th>
                    <th style="width: 60%;">{{ __('app.settings.value') }}</th>
                    <th class="text-center" style="width: 75px;">{{ __('app.settings.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @if (count($group->settings) > 0)
                @foreach ($group->settings as $setting)
                <tr>
                    <td>{{ __($setting->label) }}</td>
                    <td>
                        {!! $setting->list_value !!}
                    </td>
                    <td class="text-center">
                        @if((bool)$setting->system !== true)
                        <a href="{!! route('settings.edit', ['id' => $setting->id]) !!}" title="{{ __('app.settings.edit') }} {!! $setting->label !!}" class="secondary"><i class="fa fa-pencil"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else

                <tr>
                    <td colspan="3" class="form-error text-center">
                        <strong>{{ __('app.settings.no_items') }}</strong>
                    </td>
                </tr>
                @endif


            </tbody>
        </table>
    </div>
</div>
@endforeach

@endsection