App = {
    ajax_url: '',
    
    init: function()
    {
        $('#add').click(this.addItem);
        this.itemListEvents();
    },

    itemListEvents: function()
    {
        var item = $('table.table tr#item');

        item.find('a#delete').click(this.deleteItem);
        //page.find('a.edit_page').click(this.editItem);
    },

    getItemId: function(o)
    {
        return $(o).closest("[data-item-id]").data("itemId");
    },

    deleteItem: function()
    {
        var id = App.getItemId(this);
        notie.confirm('Вы действительно хотите удалить запись?', 'Да', 'Отменить', function() {
            App.ajax({action: 'delete_item', id: id}, function(data) {
                if (data.success) {
                    notie.alert(1, 'Запись удалена!');
                    $("[data-item-id='"+id+"']").remove();
                } else {
                    notie.alert(3, data.message, 2.5);
                }
            });
        });
    },

    addItem: function()
    {
        console.log("add");
        //App.showForm();
    },

    showForm: function(id) {
        if (!id) {
            id = 0;
        }
        this.ajax({'id': id}, function(data) {
        });
    },

    ajax: function(params, callback, form_selector) {
        if (form_selector) {
            var data = $(form_selector).serializeArray();
            for (var key in data) {
                params[data[key].name] = data[key].value;
            }
        }

        $.ajax({
            'url': this.ajax_url,
            'data': params,
            'type': 'GET',
            //'dataType': json,
            'success': callback
        });
    }
};
$(function() {
    App.init();
});