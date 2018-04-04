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
                    text: 'Категория ' + name+ ' успешно добавлена.  Обновите страницу если она не появится в списке.',
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
            statusCode: {
                403: function() {
                    swal({
                        title:'Ошибка!',
                        html: 'Категорию <b>'+ name +'</b> удалить не удалось. Убедитесь что она  не используется одним из ваших товаров!',
                        type: 'error',
                        confirmButtonClass: 'btn-danger'
                    });
                }
            },
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
                    text: 'Товар ' + name + ' успешно добавлен. Обновите страницу если он не появится в списке.',
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
                    text: 'Описание к товару ' + name + ' обновлено.',
                    type: 'success',
                    confirmButtonClass: 'btn-primary',
                    timer: 2000
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
            success: function () {
                swal({
                    title: 'Данные успешно обновлены!',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            complete: function() {
                $(Object).removeAttr('disabled');
            }
        });
    }
};

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
            statusCode: {
                403: function() {
                    swal({
                        title:'Ошибка!',
                        html: 'Сервер <b>'+ name +'</b> удалить не удалось он используется категориями или товарами!',
                        type: 'error',
                        confirmButtonClass: 'btn-danger'
                    });
                }
            },
            success: function() {
                $('#s' + id).remove();
                swal({
                    title: 'Успех!',
                    text: 'Сервер ' + name + ' успешно удалён',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
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
                    text: 'Сервер ' + name + ' успешно добавлен. Обновите страницу если он не появится в списке.',
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
            statusCode: {
                400: function() {
                    swal({
                        title: 'Ошибка!', 
                        text: 'Пользователя' + name + ' удалить невозможно. Чтобы удалить его, создайте нового пользователя.', 
                        type: 'error',
                        confirmButtonClass: 'btn-danger',
                    });
                },
                500: function() {
                    swal({
                        title: 'Ошибка!', 
                        text: 'Вы не можете удалить аккаунт, с которого сами же сидите.', 
                        type: 'error',
                        confirmButtonClass: 'btn-danger',
                    });
                },
                403: function() {
                    swal({
                        title: 'Ошибка!', 
                        text: 'Пользователь' + name + ' не был удалён по неизвестной причине.',
                        type: 'error',
                        confirmButtonClass: 'btn-danger',
                    });
                }
            },
            success: function() {
                $('#u' + id).remove();
                swal({
                    title: 'Успех!',
                    text: 'Пользователь ' + name + ' успешно удален',
                    type: 'success',
                    confirmButtonClass: 'btn-success'
                });
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

var Setting = {
    save: function(button) {
        var $form = $('#settings');

        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: $form.serialize(),
            beforeSend: function() {
                $(button).attr('disabled', '');
            },
            success: function() {
                swal({
                    type: 'success',
                    title: 'Настройки сохранены',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            complete: function() {
                $(button).removeAttr('disabled', '');
            }
        });
    }
};

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

setInterval(function() {
    $.ajax({
        url: '/admin/setOnline/user' + getCookie('auth_user_id'),
        type: 'POST',
        data: {},
        success: function(status) {
            var obj = $.parseJSON(status);
            if (obj.error === true) {
                alert('Произошла ошибка. Обновите пожалуйста страницу!')
            }
        },
        error: function() { }
    });
}, 60000);