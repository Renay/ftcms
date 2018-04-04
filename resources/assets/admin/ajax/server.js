var Server = {
    ajaxMethod: 'POST',
    effect: 'flash',

    new: function(e) {
        e.preventDefault();
        this.clear($('#new_server'));

        Custombox.open({
            target: '.modal',
            effect: this.effect,
            overlaySpeed: 200,
            overlayColor: '#36404a'
        });
    },

    edit: function(e, id) {
        e.preventDefault();

        Custombox.open({
            target: '/admin/servers/' + id,
            effect: this.effect,
            overlaySpeed: 200,
            overlayColor: '#36404a'
        });
    },

    delete: function(e, id) {
        e.preventDefault();
        var name = $('#s'+id).find('.name').text();

        $.ajax({
            url: '/admin/servers/delete',
            type: this.ajaxMethod,
            data: 'id=' + id,
            success: function() {
                $('#s' + id).remove();
                swal({
                    title: 'Успех!',
                    text: 'Сервер ' + name + ' успешно удалён',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
            },
            error: function() {
                swal('Ошибка!', 'Сервер '+ name +' не был удалён. Что-то пошло не так..', 'error');
            }
        });
    },

    onCreate: function() {
        var form = $('#new_server');
        var name = form.find('#name').val();

        $.ajax({
            url: '/admin/servers/create',
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function(result) {
                $('#server').prepend(result);
                swal({
                    title: 'Успех!',
                    text: 'Сервер ' + name + ' успешно добавлен',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
            },
            error: function() {
                swal('Ошибка!', 'Данные не прошли валидацию.', 'error');
            },
            complete: function() {
                Custombox.close();
            }
        });
    },

    onUpdate: function(id) {
        var form = $('#edit_server');
        var name = form.find('#name').val();

        $.ajax({
            url: '/admin/servers/update',
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function(result) {
                $('#s' + id).replaceWith(result);
                swal({
                    title: 'Успех!',
                    text: 'Данные сервера ' + name + ' успешно обновлёны',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
            },
            error: function() {
                swal('Ошибка!', 'Данные не прошли валидацию.', 'error');
            },
            complete: function() {
                Custombox.close();
            }
        });
    },

    clear: function (form) {
        return form.get(0).reset();
    }
};