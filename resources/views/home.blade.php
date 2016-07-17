@extends('layouts.main')

@section('content')
    <div class="container">
        @if (!Auth::check())
            <div class="jumbotron">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center">Центр волонтёров Южного Урала<br>
                            <small>Мы рады приветствовать вас!</small>
                        </h1>
                        <p class="text-primary text-justify">Волонтёрство (от лат. voluntarius — добровольный) — это
                            широкий
                            круг деятельности, включая традиционные формы взаимопомощи и самопомощи, официальное
                            предоставление
                            услуг и другие формы гражданского участия, которая осуществляется добровольно на благо
                            широкой
                            общественности без расчёта на денежное вознаграждение.
                            <a href="https://ru.wikipedia.org/wiki/%D0%92%D0%BE%D0%BB%D0%BE%D0%BD%D1%82%D1%91%D1%80%D1%81%D1%82%D0%B2%D0%BE">
                                <i class="glyphicon glyphicon-link text-primary" style="font-size: 50%"></i>
                            </a>
                        </p>
                        <p class="lead text-justify">Хотите стать Волонтером? Вам следует пройти простую регистрацию,
                            чтобы
                            всегда быть в курсе текущих мероприятий и активно принимать в них участие.</p>
                    </div>
                    <div class="col-md-offset-3 col-md-6">
                        <div class="btn-group btn-group-justified" role="group">
                            <a href="{{ url('/register') }}" class="btn btn-lg btn-success">Зарегистрироваться</a>
                            <a href="{{ url('/login') }}" class="btn btn-lg btn-success">Войти</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            @foreach ($news as $n)
                <div class="col-xs-12">
                    @include('common.news_card')
                </div>
            @endforeach
            <div class="col-xs-12">
                <ul class="pagination" style="display: flex; justify-content: center"></ul>
            </div>
        </div>
        <script>
            $(function () {
                var count = {{ $count }};
                if (count > 1)
                    $('ul.pagination').pagination({
                        items: count,
                        itemsOnPage: {{ $perPage }},
                        hrefTextPrefix: '/',
                        currentPage: {{ $page }},
                        prevText: 'Пред',
                        nextText: 'След',
                        selectOnClick: false
                    });
            });
        </script>
    </div>
@endsection