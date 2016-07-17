<div class="panel panel-primary">
    <div class="panel-heading">
        <h2>{{ $n->title }}</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                {!! BBCode::parse($n->content) !!}
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-7">
                <p class="text-muted">
                    <?php $date = \Carbon\Carbon::parse($n->created_at) ?>
                    Создано: {{ $date->format('d m Y') }}<br>
                    <?php
                    $user = $n->getCreator()->first();
                    $nolink = true;
                    ?>
                    <a class="link-muted">@include('common.user_profile_link')</a>
                </p>
            </div>
            <div class="col-md-5">
                <a class="btn btn-info pull-right" href="{{ url('news/' . $n->id) }}">Читать дальше >></a>
            </div>
        </div>
    </div>
</div>