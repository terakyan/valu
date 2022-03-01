<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{ config('app.name', 'Valu') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('bootstrap-4/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('admin._partials.header')
    <div class="app-main">
        @include('admin._partials.menu')
        <div class="app-main__outer">
            @yield('content')
        </div>
    </div>
</div>

<div class="modal fade" id="delete_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="delete_item_label">Are you sure you want to delete this ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a id="item_modal_delete_button" class="btn btn-danger float-right ml-2" data-slug="empty" data-url="empty">{{ __('delete') }}</a>
                <a class="btn btn-default float-right ml-2" data-dismiss="modal">{{ __('cancel') }}</a>
            </div>
        </div>
    </div>
</div>
{{--<!-- jQuery 3 -->--}}
<script src="{{ asset('jquery/dist/jquery.js') }}" ></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('jquery-ui/jquery-ui.js') }}" ></script>
<script src="{{ asset('bootstrap-4/js/bootstrap.bundle.min.js') }}" ></script>

@yield('js')
<script src="{{ asset('js/admin/admin.js') }}" defer></script>
<script src="{{ asset('js/admin/main.js') }}" defer></script>
</body>
</html>

