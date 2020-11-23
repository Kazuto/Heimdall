<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="mask-icon" href="{{ asset('img/heimdall-logo-small.svg') }}" color="black">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="{{ asset('css/app.css?v=2') }}" type="text/css" />
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    @if(config('app.url') !== 'http://localhost')
    <base href="{{ config('app.url') }}">
    @else
    <base href="{{ url('') }}">
    @endif
</head>

<body>
    <div id="app" {!! $alt_bg !!}>
        <nav class="sidenav">
            <a class="close-sidenav" href=""><i class="fas fa-times-circle"></i></a>
            @if(isset($all_apps))
            <h2>{{ __('app.dash.pinned_items') }}</h2>
            <ul id="pinlist">
                @foreach($all_apps as $app)
                <?php
                $active = ((bool)$app->pinned === true) ? 'active' : '';
                ?>
                <li>{{ $app->title }}<a class="{{ $active }}" data-tag="{{ $tag ?? 0 }}" data-id="{{ $app->id }}" href="{{ route('items.pintoggle', [$app->id]) }}"><i class="fas fa-thumbtack"></i></a></li>

                @endforeach
            </ul>
            @endif
        </nav>
        <div class="content">
            <header class="appheader">
                <ul>
                    <li><a href="{{ route('dash', []) }}">Dash</a></li>
                    <li>
                        <a href="{{ route('items.index', []) }}">Items</a></li>
                </ul>
            </header>
            <main>
                <section class="section">
                    <div class="container">
                        @if ($message = Session::get('success'))
                        <div class="alert alert--success mb--5">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert--danger mb--5">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @yield('content')
                    </div>
                </section>

            </main>

            <nav class="nav nav--fixed-bottom">
                @if($allusers->count() > 1)
                <a class="nav__item nav__item--avatar" href="{{ route('user.select') }}" data-title="Switch User">
                    @if($current_user->avatar)
                    <img class="user__image" src="{{ asset('/storage/'.$current_user->avatar) }}" />
                    @else
                    <img class="user__image" src="{{ asset('/img/heimdall-icon-small.png') }}" />
                    @endif
                </a>
                @endif

                <div class="spacer"></div>

                @if(Route::is('dash') || Route::is('tags.show'))
                <a id="config-button" class="nav__item nav__item--icon" href=""><i class="fas fa-exchange"></i></a>
                @endif

                <a id="dash" class="nav__item nav__item--icon" href="{{ route('dash', []) }}"><i class="fas fa-th"></i></a>
                @if($current_user->id === 1)
                <a id="users" class="nav__item nav__item--icon" href="{{ route('users.index', []) }}"><i class="fas fa-user"></i></a>
                @endif
                <a id="items" class="nav__item nav__item--icon" href="{{ route('items.index', []) }}"><i class="fas fa-list"></i></a>
                <a id="folder" class="nav__item nav__item--icon" href="{{ route('tags.index', []) }}"><i class="fas fa-tag"></i></a>
                <a id="settings" class="nav__item nav__item--icon" href="{{ route('settings.index', []) }}"><i class="fas fa-cogs"></i></a>
            </nav>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/app.js?v=4') }}"></script>
    @yield('scripts')

</body>

</html>