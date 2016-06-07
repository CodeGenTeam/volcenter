App = {
    ajax_url: '',
    
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
        this.ajax({'id': id}, function(data) {
        });
    },

    ajax: function(params, callback, form_selector) {
        var data = "";
        if (form_selector) {
            data = $(form_selector).serializeArray();
        }

        $.ajax({
            'url': this.ajax_url,
            'data': data,
            'type': 'POST',
            'success': callback
        });
    }
};

$(function() {
    App.init();
});