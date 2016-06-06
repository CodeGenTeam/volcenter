<html>
    <head>
        <title>{{ 'Админ-панель' . ( is_array($modules) ? '' : $modules->getName()) }}</title>
        <link rel="stylesheet" type="text/css" href="/ap-bin/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="/ap-bin/css/material.css"/>
        <link rel="stylesheet" type="text/css"
              href="/ap-bin/css/material-fullpalette.css"/> {{-- это тестовая палитра нужна ток ради подкрашивания элементов --}}

        <script type="text/javascript" src="/ap-bin/js/bootstrap.js"></script>
        <script type="text/javascript" src="/ap-bin/js/jQuery.js"></script>
        <script type="text/javascript" src="/ap-bin/js/material.js"></script>
        <script type="text/javascript" src="/ap-bin/js/ripples.js"></script>
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
                            @foreach (APanel::getModules() as $module)
                                <li{!! isset($selected) && $selected == $module->getName() ? ' class="active"' : '' !!}>
                                    <a href="/adminpanel/module/{{ $module->getName() }}">{{ $module->getDisplayName() }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </div>
        </nav>
        @foreach ($modules as $module)
            <div class="module" id="{{ $module->getName() }}-module">
                {!! $module->getView() !!}
            </div>
        @endforeach
    </body>
</html>