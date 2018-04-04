var Merchant = {
    ajaxMethod: 'POST',
    effect: 'flash',

    onUpdate: function(Object) {
        var $form = $(Object).closest('form');

        $.ajax({
            url: $form.attr("action"),
            type: this.ajaxMethod,
            data: $form.serialize(),
            beforeSend: function () {
                $(Object).attr('disabled', '');
            },
            statusCode: {
                404: function() {
                    swal('Ошибка!', 'Такой платежного агрегатора не найдено!', 'error');
                },
                403: function() {
                    swal('Ошибка!', 'Отправился пустой запрос.. Вы точно ввели заполнили все поля?', 'error');
                }
            },
            success: function (result) {
                $form.replaceWith(result);
                swal({
                    title: 'Успех!!',
                    text: 'Данные успешно обновлены.',
                    type: 'success',
                    confirmButtonClass: 'btn-primary'
                });
            },
            complete: function() {
                $(Object).removeAttr('disabled');
            }
        });
    }
};