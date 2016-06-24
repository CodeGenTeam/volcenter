<html>
    <head>
        <title>{{ $title or 'Админ-панель' }}</title>
        <link rel="stylesheet" type="text/css" href="/admin_panel_bin/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="/admin_panel_bin/css/material.css"/>
        <link rel="stylesheet" type="text/css" href="/admin_panel_bin/css/material-fullpalette.css"/>
        {{-- это тестовая палитра нужна ток ради подкрашивания элементов --}}
        <link rel="stylesheet" type="text/css" href="/admin_panel_bin/css/notie.css"/>
        <link rel="stylesheet" type="text/css" href="/admin_panel_bin/css/bootstrap-datetimepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="/admin_panel_bin/css/fileinput.min.css"/>

        <script type="text/javascript" src="/admin_panel_bin/js/jQuery.js"></script>
        <script type="text/javascript" src="/admin_panel_bin/js/bootstrap.js"></script>
        <script type="text/javascript" src="/admin_panel_bin/js/material.js"></script>
        <script type="text/javascript" src="/admin_panel_bin/js/ripples.js"></script>
        <script type="text/javascript" src="/admin_panel_bin/js/validator.js"></script>
        <script type="text/javascript" src="/admin_panel_bin/js/app.js"></script>
        <script type="text/javascript" src="/admin_panel_bin/js/moment.min.js"></script>
        <script type="text/javascript" src="/admin_panel_bin/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/admin_panel_bin/js/fileinput.min.js"></script>

        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
              rel="stylesheet"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#admin-nav-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/adminpanel">VolCenter AdminPanel</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="admin-nav-collapse">
                        <ul class="nav navbar-nav">
                            @foreach (Admin::getLinks() as $link)
                                <li{!! isset($pageId) && $pageId == $link['id'] ? ' class="active"' : '' !!}>
                                    <a href="/adminpanel/{{ $link['link'] }}">{{ $link['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="./">{{Auth::user()->role()}} <span class="sr-only">(current)</span></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </div>
        </nav>
        @yield('content')
        <script>$.material.init();</script>
        <script type="text/javascript" src="/admin_panel_bin/js/notie.min.js"></script>
    </body>
</html>