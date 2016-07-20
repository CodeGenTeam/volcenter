query = {
    url: 'http://' + location.host + '/',
    query: function (url, data, method, callback) {
        return $.ajax({
            url: query.url + url,
            type: method,
            data: data,
            success: callback,
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    },
    get: function (url, data, callback) {
        return query(url, data, 'GET', callback);
    },
    post: function (url, data, callback) {
        return query(url, data, 'POST', callback);
    }
};
