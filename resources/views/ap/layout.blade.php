<html>
    <head>
        <title>{{ $title or 'Админ-панель' }}</title>
        <link rel="stylesheet" type="text/css" href="/ap-bin/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="/ap-bin/css/material.css"/>
        <link rel="stylesheet" type="text/css"
              href="/ap-bin/css/material-fullpalette.css"/> {{-- это тестовая палитра нужна ток ради подкрашивания элементов --}}
        <link rel="stylesheet" type="text/css" href="/ap-bin/css/notie.css"/>

        <script type="text/javascript" src="/ap-bin/js/jQuery.js"></script>
        <script type="text/javascript" src="/ap-bin/js/bootstrap.js"></script>
        <script type="text/javascript" src="/ap-bin/js/material.js"></script>
        <script type="text/javascript" src="/ap-bin/js/ripples.js"></script>
        <script type="text/javascript" src="/ap-bin/js/app.js"></script>
        <script type="text/javascript" src="/ap-bin/js/notie.min.js"></script>

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
                            @foreach (APanel::getLinks() as $link)
                                <li{!! isset($pageId) && $pageId == $link['id'] ? ' class="active"' : '' !!}>
                                    <a href="/adminpanel/{{ $link['link'] }}">{{ $link['name'] }}</a>
                                </li>
                            @endforeach
                            {{--<li><a href="#">Somelink</a></li>--}}
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </div>
        </nav>
        @yield('content')
        <script>$.material.init();</script>
    </body>
</html>