var Category = {
    ajaxMethod: 'POST',
    effect: 'flash',

    new: function(e) {
        e.preventDefault();
        this.clear($('#new_category'));

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
            target: '/admin/categories/' + id,
            effect: this.effect,
            overlaySpeed: 200,
            overlayColor: '#36404a'
        });
    },

    onCreate: function() {
        var form = $('#new_category');
        var name = form.find('#name').val();

        $.ajax({
            url: '/admin/categories/create',
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function(result) {
                $('tbody').prepend(result);
                swal({
                    title: 'Успех!',
                    text: 'Категория ' + name+ ' успешно добавлена',
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
        var form = $('#edit_category');
        var name = form.find('#name').val();

        $.ajax({
            url: '/admin/categories/update',
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function(result) {
                $('#c' + id).replaceWith(result);
                swal({
                    title: 'Успех!',
                    text: 'Категория ' + name + ' успешно обновлёна',
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

    onDelete: function(e, id) {
        e.preventDefault();
        var name = $('#c' + id).find('.name').text();
        $.ajax({
            url: '/admin/categories/delete',
            type: this.ajaxMethod,
            data: 'id=' + id,
            success: function(result) {
                $('#c' + id).remove();
                swal({
                    title: 'Успех!',
                    text: 'Категория ' + name+ ' успешно удалена',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
            },
            error: function() {
                swal('Ошибка!', 'Категорию ' + name + ' удалить не получилось. Что-то пошло не так..', 'error');
            },
        });
    },

    clear: function (form) {
        return form.get(0).reset();
    }
};