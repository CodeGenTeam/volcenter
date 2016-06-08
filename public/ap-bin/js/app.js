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
        item.find('a#edit').click(this.editItem);
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
        App.showForm();
    },

    showForm: function(id) 
    {
        if (!id) {
            id = 0;
        }
        this.ajax({action: 'edit_item', 'id': id}, function(data) {
            App.createModal('item_modal', data);
            $('#save_item').on('click', App.saveItemForm);
        });
    },

    saveItemForm: function() 
    {
        $.fn.popelValidator.defaults.callbackAfterValidate = function() {
            App.ajax({action: 'save_item'}, function (data) {
                if (data.success) {
                    App.closeModal('item_modal');
                    notie.alert(1, data.message);
                } else {
                    notie.alert(3, data.message, 2.5);
                }
            }, '#item-form');
        }
    },
    
    editItem: function()
    {
        var id = App.getItemId(this);
        if (id) {
            App.showForm(id);
        }
        return false;
    },
    
    createModal: function(id, content) 
    {
        var selector = '#'+id;
        $(selector)
            .html(content)
            .modal({"show": true})
        ;
    },

    closeModal: function(id) 
    {
        $('#'+id).modal('hide');
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
            'success': callback
        });
    }
};
$(function() {
    App.init();
});