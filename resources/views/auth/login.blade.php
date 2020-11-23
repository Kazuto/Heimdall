@extends('layouts.app')

@section('content')
<?php
$user = \App\User::currentUser();
?>
<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="userlist">
    
        <div class="user" href="{{ route('user.set', [$user->id]) }}">
            @if($user->avatar)
            <img class="user-img" src="{{ asset('/storage/'.$user->avatar) }}" />
            @else
            <img class="user-img" src="{{ asset('/img/heimdall-icon-small.png') }}" />
            @endif
            {{ $user->username }}
            <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" autofocus required>
            </div>
            <button type="submit" class="button button--primary button--block">Login</button>
        </div>
    </div>
        
</form>

@endsection
