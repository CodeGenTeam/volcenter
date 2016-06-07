App = {
    init: function()
    {
        $('#add').click(this.add);
    },

    add: function()
    {
        App.showForm();
    },

    showForm: function(id) {
        if (!id) {
            id = 0;
        }
        //TODO  events - get from data
        this.ajax('/adminpanel/module/events/show', {'id': id}, function(data) {
        });
    },

    ajax: function(ajax_url, callback, form_selector) {
        var data = "";
        if (form_selector) {
            data = $(form_selector).serializeArray();
        }

        $.ajax({
            'url': ajax_url,
            'data': data,
            'type': 'POST',
            'success': callback
        });
    }
};

$(function() {
    App.init();
});