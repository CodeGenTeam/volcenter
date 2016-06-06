<html>
    <head>
        <title>{{ 'Админ-панель' . ( is_array($modules) ? '' : $modules->getName()) }}</title>
        <link rel="stylesheet" type="text/css" href="/ap-bin/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="/ap-bin/css/material.css"/>
        <link rel="stylesheet" type="text/css" href="/ap-bin/css/material-fullpalette.css"/> {{-- это тестовая палитра нужна ток ради подкрашивания элементов --}}

        <script type="text/javascript" src="/ap-bin/js/bootstrap.js"></script>
        <script type="text/javascript" src="/ap-bin/js/jQuery.js"></script>
        <script type="text/javascript" src="/ap-bin/js/material.js"></script>
        <script type="text/javascript" src="/ap-bin/js/ripples.js"></script>
    </head>
    <body>
        <div class="container">
            @foreach ($modules as $module)
                <div class="module">
                    {!! $module->getView() !!}
                </div>
            @endforeach
        </div>
    </body>
</html>