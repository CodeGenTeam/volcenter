@extends('layouts.main')

@section('content')
    <div id="el_event_type" class="container">
        <div class = "panel panel-default" v-el:click_button>
            <div class = "panel-heading">Типы мероприятий
                <span class="glyphicon glyphicon-plus" aria-hidden="true" rel="tooltip" title="Добавить новый тип" data-toggle="modal" data-target="#m_add"></span>
            </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Название типа мероприятия</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
             <tr v-for="item in event_type">
                 <td>@{{item.id}}</td>
                 <td>@{{item.name}}</td>
                 <td>
                     <span class="glyphicon glyphicon-pencil" aria-hidden="true" rel="tooltip" title="Изменить" data-toggle="modal" data-target="#m_edit" v-on:click="click"></span>
                     <span class="glyphicon glyphicon-remove" aria-hidden="true" rel="tooltip" title="Удалить" data-toggle="modal" data-target="#m_del" v-on:click="click"></span>
                 </td>
             </tr>
            </tbody>
        </table>
        </div>
        <template id="collection">
            <div class="modal fade" id="@{{m_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">@{{m_title}}</h4>
                            </div>
                        <div class="modal-body">
                            @{{m_body}}<span v-if="!m_input_show">: @{{m_value}}</span><br />
                            <input type="text" v-if="m_input_show " v-model="m_value" placeholder="Новое значение" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="save">@{{b_name_yes}}</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="close">@{{b_name_no}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <module-window m_title="Добавление типа мероприятия" m_body="Введите строковое значение для типа мероприятия" m_id="m_add" :m_input_show="true" b_name_yes="Создать" b_name_no="Отмена"></module-window>
        <module-window m_title="Изменение типа мероприятия" m_body="Введите новое значение для типа мероприятия" m_id="m_edit" :m_input_show="true" b_name_yes="Обновить" b_name_no="Отмена"></module-window>
        <module-window m_title="Удаление типа мероприятия" m_body="Удаление типа мероприятия" m_id="m_del" :m_input_show="false" b_name_yes="Удалить" b_name_no="Отмена"></module-window>
    </div>
@endsection

@push('scripts')
<script src="/vue/event_type/event_type.js"></script>
<script>
    $(function() {
        $('body').tooltip({
            selector: "[rel=tooltip]",
            placement: "top"
        });
        $('tbody').on("click", "tr", function () {
            vm.current_id = $(this).find('td:eq(0)').text();
            vm.current_text = $(this).find('td:eq(1)').text();
        });
    });
</script>
@endpush