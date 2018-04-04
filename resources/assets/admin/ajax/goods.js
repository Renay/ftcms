var Goods = {
    ajaxMethod: 'POST',
    effect: 'flash',

    new: function(e) {
        e.preventDefault();
        this.clear($('#new_product'));

        Custombox.open({
            target: '.modal',
            effect: this.effect,
            overlaySpeed: 200,
            overlayColor: '#36404a'
        });
    },

    desc: function(e, id) {
        e.preventDefault();
        Custombox.open({
            target: '/admin/goods/desc/'+ id,
            effect: this.effect,
            overlaySpeed: 200,
            overlayColor: '#36404a'
        });
    },

    edit: function(e, id) {
        e.preventDefault();

        Custombox.open({
            target: '/admin/goods/'+ id,
            effect: this.effect,
            overlaySpeed: 200,
            overlayColor: '#36404a'
        });
    },

    onCreate: function() {
        var form = $('#new_product');
        var name = form.find('#name').val();

        $.ajax({
            url: form.attr("action"),
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function (result) {
                $('div.elements').prepend(result);
                swal({
                    title: 'Успех!',
                    text: 'Продукт ' + name + ' успешно добавлен',
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

        return false;
    },

    onUpdate: function(id) {
        var form = $('#edit_product');
        var name = form.find('#name').val();

        $.ajax({
            url: form.attr("action"),
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function (result) {
                $('#g' + id).replaceWith(result);
                swal({
                    title: 'Успех!!',
                    text: 'Товар ' + name + ' успешно обновлён.',
                    type: 'success',
                    confirmButtonClass: 'btn-primary'
                });
            },
            error: function () {
                swal('Ошибка!', 'Упс.. Что-то пошло не так', 'error');
            },
            complete: function() {
                Custombox.close();
            }
        });

        return false;
    },

    onDescription: function() {
        var form = $('#edit_description');
        var name = form.find('#name').val();

        $.ajax({
            url: '/admin/goods/desc',
            type: this.ajaxMethod,
            data: form.serialize(),
            success: function() {
                swal({
                    title: 'Успех!',
                    text: 'Описание к товару ' + name + ' добавлено.',
                    type: 'success',
                    confirmButtonClass: 'btn-primary'
                });
            },
            error: function () {
                swal('Ошибка!!', 'Упс.. Что-то пошло не так', 'error');
            },
            complete: function() {
                Custombox.close();
            }
        })
    },

    onDelete: function(e, id) {
        e.preventDefault();

        var name = $('#g'+ id).find('.name').text();

        $.ajax({
            url: '/admin/goods/delete',
            type: this.ajaxMethod,
            data: "id=" + id,
            success: function () {
                $("#g" + id).remove();

                swal({
                    title: 'Успешно!',
                    text: 'Товар ' + name +' успешно удалён',
                    type: 'success',
                    confirmButtonClass: 'btn-primary'
                });
            },
            error: function () {
                swal('Ошибка!!', 'Удалить товар ' + name + ' не удалось..', 'error');
            }
        })
    },

    clear: function (form) {
        return form.get(0).reset();
    }
};