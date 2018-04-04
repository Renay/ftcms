var User = {
    ajaxMethod: 'POST',
    effect: 'flash',

    new: function(e) {
        e.preventDefault();
        this.clear($('#new_user'));

        Custombox.open({
            target: '.modal',
            effect: this.effect,
            overlaySpeed: 200,
            overlayColor: '#36404a'
        });
    },

    edit: function (e, id) {
        e.preventDefault();

        Custombox.open({
            target: '/admin/users/' + id,
            effect: this.effect,
            overlaySpeed: 200,
            overlayColor: '#36404a'
        });
    },

    delete: function(e, id) {
        e.preventDefault();

        var name = $('#u' + id).find('.name').text();

        $.ajax({
            url: '/admin/users/delete',
            type: this.ajaxMethod,
            data: 'id=' + id,
            success: function() {
                $('#u' + id).remove();
                swal({
                    title: 'Успех!',
                    text: 'Пользователь ' + name + ' успешно удален',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
            },
            error: function() {
                swal('Ошибка!', 'Пользователь чёт не удалился ' + name + ' не была добавлена. Что-то пошло не так..', 'error');
            },
            complete: function() {
                Custombox.close();
            }
        });
    },

    onCreate: function() {
        var form = $('#new_user');

        $.ajax({
            url: '/admin/users/create',
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function(result) {
                $('#users').prepend(result);
                swal({
                    title: 'Успех!',
                    text: 'Пользователь ' + name+ ' успешно создан',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
            },
            error: function() {
                swal('Ошибка!', 'Ваши данные не прошли валидацию. Убедитесь что пользователя с такими данными нет в базе данных.', 'error');
            },
            complete: function() {
                Custombox.close();
            }
        });
    },

    onUpdate: function(id) {
        var form = $('#edit_user');
        $.ajax({
            url: '/admin/users/update',
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function(result) {
                $('#u' + id).replaceWith(result);
                swal({
                    title: 'Успех!',
                    text: 'Данные пользователя' + name + ' успешно обновлёны',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
            },
            error: function() {
                swal('Ошибка!', 'Ваши данные не прошли валидацию. Убедитесь что пользователя с такими данными нет в базе данных.', 'error');
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