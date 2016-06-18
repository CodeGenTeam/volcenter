@extends('admin_panel.layout')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container">
                <h2>Редактор правил группы {{ $group->name }}<br>
                    <small>{{ $group->descr }}</small>
                </h2>
                @if ($group->name != 'guest')
                    <p><a href="/adminpanel/pex/group/users?group={{ $group->id }}" class="pull-right">Пользователей в
                            данной группе: {{ $group->users()->count() }}</a></p>
                @endif
            </div>
        </div>
        <div class="panel-body">
            <div class="container">
                @if (Pex::can('permissions.group.rule.add'))
                    <button class="btn btn-primary pull-right" id="add">
                        <i class="mdi-av-my-library-add" style="font-size: 20px;"></i> Добавить правило
                    </button>
                @endif
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Описание правила</th>
                            <th>Имя правила</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rules = $group->rules()->get(); ?>
                        @if ($rules->count() > 0)
                            @foreach($rules as $rule)
                                <?php $isFixed = in_array($rule->rule, $fixed); if ($isFixed) unset($fixed[$rule->rule])?>
                                <tr id="item"{!! $rule->rule == '*' ? ' class="warning"' : '' !!}{{ $isFixed ? 'fixed' : '' }}>
                                    <td>{{ $rule->id }}</td>
                                    <td>{{ $rule->descr }}</td>
                                    <td>{{ $rule->rule }}</td>
                                    <td>
                                        @if (!$isFixed)
                                            <span class="pull-right"><i class="mdi mdi-action-delete mdi-material-teal"
                                                                        style="cursor: pointer; margin: -8px 0"
                                                                        data-item-action="remove"
                                                                        data-item-id="{{ $rule->id }}"
                                                                        data-group-id="{{ $group->id }}"></i></span>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include ('admin_panel.pex.addRuleModal')
    <script>
        $('div.container tr > td i[data-item-action]').click(function (ele) {
            jele = $(ele.target);
            $.get('/adminpanel/pex/group',
                    {
                        action: jele.attr('data-item-action'),
                        ruleId: jele.attr('data-item-id'),
                        groupId: jele.attr('data-group-id')
                    },
                    function () {
                        switch (jele.attr('data-item-action')) {
                            case 'remove':
                                console.log(jele.parent('#item'));
                                jele.parents('tr#item').remove();
                                break;
                        }
                    }
            );
        });
        $('[fixed]').tooltip({title: 'Вы не можете взаимодействовать с этим полем'});
        $('button#add').click(function () {
            $('div#addRuleModal').modal('show');
        });
    </script>
@endsection
