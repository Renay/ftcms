var Payment = {
    ajaxMethodPost: 'POST',
    ajaxMethodGet: 'GET',

    changeServer: function () {
        var $goods = $('#field-6');
        var $server = $('#field-2');

        $.ajax({
            url: '/admin/payment/getgoods',
            type: this.ajaxMethodPost,
            data: {
                server: $server.find('option:selected').val()
            },
            success: function(result) {
                $goods.html(result);
            }
        })
    },

    search: function() {
        var search = $('.search').val();
        
        $.ajax({
            url: '/admin/payments/search',
            type: this.ajaxMethodPost,
            data: 'search=' + search,
            success: function(result) {
                $('tbody').html(result.length < 1 ? '<tr><td style="text-align: center;" colspan="8">' +
                    '<strong>Платежей нет по данному запросу..</strong>' +
                    '</td></tr>' : result);
            }
        });
    }

};

console.log(Payment);