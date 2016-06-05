@foreach ($modules as $module)
    <p>
        {{ $module->getView() }}
    </p>
@endforeach