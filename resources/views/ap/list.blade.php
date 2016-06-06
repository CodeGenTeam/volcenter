<html>
    <head>
        <title>{{ 'Админ-панель' . ( is_array($modules) ? '' : $modules->getName()) }}</title>
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