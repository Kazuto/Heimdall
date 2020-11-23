@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card__header">
        <div class="card__title">
            {{ __('app.apps.tag_list') }}
            @if( isset($trash) && $trash->count() > 0 )
            <a class="trashed" href="{{ route('tags.index', ['trash' => true]) }}">{{ __('app.apps.view_trash') }} ({{ $trash->count() }})</a>
            @endif

        </div>
        <div class="card__actions">
            <a href="{{ route('tags.create', []) }}" title="" class="card__action"><i class="fa fa-plus"></i><span>{{ __('app.buttons.add') }}</span></a>
            <a href="{{ route('dash', []) }}" class="card__action"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
        </div>
    </header>

    <div class="card__body card__body--flush">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('app.title') }}</th>
                    <th>{{ __('app.url') }}</th>
                    <th class="text-center" width="100">{{ __('app.settings.edit') }}</th>
                    <th class="text-center" width="100">{{ __('app.delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @if($apps->first())
                @foreach($apps as $app)
                <tr>
                    <td>{{ $app->title }}</td>
                    <td>
                        <a{{ $app->target }} href="/tag/{{ $app->url }}">{{ $app->link }}</a>
                    </td>
                    <td class="text-center"><a href="{!! route('tags.edit', [$app->id]) !!}" title="{{ __('app.settings.edit') }} {!! $app->title !!}"><i class="fas fa-edit"></i></a></td>
                    <td class="text-center">
                        {!! Form::open(['method' => 'DELETE','route' => ['tags.destroy', $app->id],'style'=>'display:inline']) !!}
                        <button class="link" type="submit"><i class="fa fa-trash-alt"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="form-error text-center">
                        <strong>{{ __('app.settings.no_items') }}</strong>
                    </td>
                </tr>
                @endif


            </tbody>
        </table>
    </div>
</div>
@endsection