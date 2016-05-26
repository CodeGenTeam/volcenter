@extends('layouts.main')

@section('content')
    <div id="app">
        @{{ message }}
    </div>
    <script>
        new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue.js!'
            }
        });
    </script>
@endsection