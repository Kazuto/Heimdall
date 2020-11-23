<?php
    $item = $item ?? new App\Item;
?>
<div class="item-container" data-id="">
    <div class="item set-bg-elem" style="background-color: {{ $item->colour ?? '#222' }}">
        @if(isset($item->icon) && !empty($item->icon))
        <img class="item__icon" src="{{ asset('/storage/'.$item->icon) }}" />
        @else
        <img class="item__icon" src="{{ asset('/img/heimdall-icon-small.png') }}" />
        @endif
        <div class="item__details">
            <div class="title{{ title_color($item->colour) ?? 'white' }}">{{ $item->title ?? '' }}</div>
            @if($item->enhanced())
            <div data-id="{{ $item->id }}" data-dataonly="{{ $item->getconfig()->dataonly ?? '0' }}" class="no-livestats-container"></div>
            @endif
        </div>
        <a class="item__link{{ title_color($item->colour) }}" {!! $item->link_target !!} href="{{ $item->link }}"><i class="fas {{ $item->link_icon }}"></i></a>
    </div>
    <a class="item__edit" href="{{ route($item->link_type.'.edit', [ $item->id ]) }}"><i class="fas fa-pencil"></i></a>
</div>