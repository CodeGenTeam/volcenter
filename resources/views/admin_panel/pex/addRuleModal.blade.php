<?php
$allRules = App\Permissions\Models\Rule::all();
?>
<div class="modal fade" id="addRuleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавление нового правила</h4>
            </div>
            <div class="modal-body">
                <div style="height: 500px; overflow: scroll;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Описание правила</th>
                                <th>Имя правила</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allRules as $rule)
                                <tr id="row-{{ $rule->id }}">
                                    <th><input type="checkbox" id="rule-{{ $rule->id }}" data-rule-id="{{ $rule->id }}">
                                    </th>
                                    <th>{{ $rule->descr }}</th>
                                    <th>{{ $rule->rule }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="addRule">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
<script>
    var rows = $('div#addRuleModal [id|="row"]:has(th input[id|="rule"])');
    rows.css({cursor: 'pointer'});
    rows.click(function () {
        var jele = $(this).find('input[type="checkbox"]');
        jele.prop('checked', function (index, value) {
            jele.prop('checked', !value);
        });
    });
</script>