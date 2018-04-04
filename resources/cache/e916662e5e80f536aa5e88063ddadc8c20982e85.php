<?php $__env->startSection('title', 'Network page'); ?>

<?php $__env->startSection('content'); ?>
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="<?php echo e(asset('app/images/home/icon1.png')); ?>" alt="">
                    </div>
                    <h2>Выживание</h2>
                    <p>В настоящее время сервер выживания находится в разработке..</p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                        <img src="<?php echo e(asset('app/images/home/icon2.png')); ?>" alt="">
                    </div>
                    <h2>Экономика</h2>
                    <p>Уникальная система экономики.
                        Все как в реальной жизни, заходи и посмотри!</p>
                </div>
            </div>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                        <img src="<?php echo e(asset('app/images/home/icon3.png')); ?>" alt="">
                    </div>
                    <h2>Эвенты</h2>
                    <p>Каждую неделю у нас проходят интересные конкурсы и мероприятия</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#services-->




<section id="action" class="responsive">
    <div class="vertical-center">
        <div class="container">
            <div class="row">
                <div class="action take-tour">
                    <div class="col-sm-7 wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                        <h1 class="title">Описание статусов</h1>
                        <p>Чтобы узнать, что дают статусы на нашем сервере - нажми кнопку справа</p>
                    </div>
                    <div class="col-sm-5 text-center wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 300ms; animation-name: fadeInRight;">
                        <div class="tour-button">
                            <a href="/description" class="btn btn-common">ЖМИ СЮДА</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#action-->

<section id="clients">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                    <p><img src="<?php echo e(asset('app/images/home/clients.png')); ?>" class="img-responsive" alt=""></p>
                    <h1 class="title">Покупка доната</h1>
                    <p>Приобретая товары на нашем сайте вы автоматически
                        <br>соглашаетесь с <a href="/rules">правилами</a> проекта </p>
                </div>
                <div class="clients-logo wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">

                    <div class="col-md-4 col-sm-8 col-sm-offset-2 col-md-offset-4">
                        <div class="contact-form bottom">
                            <form id="main-contact-form" name="contact-form" method="post" action="/payment">
                                <div class="form-group">
                                    <input type="text" name="username" onkeyup="App.changeGoods()" class="form-control" required="required" placeholder="Ваш игровой никнейм">
                                </div>
                                <div class="form-group">
                                    <select name="server" id="server" onchange="App.changeServer()" class="form-control" required title="">
                                        <option value="null" disabled="disabled" selected>Выберите сервер</option>
                                        <option value="0">Все</option>
                                        <?php $__currentLoopData = $servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $server): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($server['id']); ?>"><?php echo e($server['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <select name="product" onchange="App.changeGoods()" id="goods" class="form-control" required title="">
                                        <option value="null" disabled="disabled" selected>Выберите товар</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="button" name="submit" onclick="App.onSubmit()" class="btn btn-submit" id="button" value="Купить">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">

        $(document).ready(function() {
            $('a').on('click', function(e) {
                e.preventDefault();

                window.location.href = $(this).attr('href');
            });
        });

        var App = {

            onSubmit: function() {
                var $goods = $("#goods").val();
                var $user = $('input[name="username"]').val();
                var $server = $('#server').val();

                if ($goods.length < 1 && $user.length < 4)
                    return false;

                $.ajax({
                    url: '/goods/buy',
                    type: 'POST',
                    data: 'goods='+ $goods +'&user=' + $user +'&server=' + $server,
                    statusCode: {
                        400: function() {
                            $('#button').attr('disabled', '').val('Вам это купить нельзя');
                        },
                        403: function() {
                            $('#button').attr('disabled', '').val('Товар закончился!');
                        },
                        500: function() {
                            $('#button').attr('disabled', '').val('Ошибка! Платежи запрещены');
                        }
                    },
                    beforeSend: function() {
                        $('#button').attr('disabled', '');
                    },
                    success: function (url) {
                        window.location.href = url;
                    },
                    complete: function () {
                        $('#button').removeAttr('disabled');
                    }
                });
            },

            changeGoods: function() {
                var $goods = $("#goods").val();
                var $user = $('input[name="username"]').val();

                if ($goods.length < 1 && $user.length < 4) {
                    return;
                }

                $.ajax({
                    url: '/goods/recount/' + $goods,
                    type: 'POST',
                    data: 'user=' + $user,
                    statusCode: {
                        400: function() {
                            $('#button').attr('disabled', '').val('Выберите что нибудь подороже');
                        },
                        403: function() {
                            $('#button').attr('disabled', '').val('Товар закончился!');
                        },
                        500: function() {
                            $('#button').attr('disabled', '').val('Введите ник');
                        },
                        503: function() {
                            $('#button').attr('disabled', '').val('Ошибка! Платежи запрещены');
                        }
                    },
                    beforeSend: function() {
                        $('#button').attr('disabled', '');
                    },
                    success: function (html) {
                        $("#button").val(html).removeAttr('disabled');
                    }
                });
            },

            changeServer: function() {
                var $server = $("#server").val();

                $.ajax({
                    url: '/goods/server/' + $server,
                    type: 'POST',
                    statusCode: {
                        403: function() {
                            $('#goods').parent().fadeOut("fast");
                            $('#button')
                                .attr('disabled', '')
                                .val('На данном сервере нет товаров');
                        }
                    },
                    beforeSend: function() {
                        $('#button').val('Зарузка...').attr('disabled', '');
                        $("#goods").html('<option value="null" disabled="disabled" selected>Выберите товар</option>');
                    },
                    success: function (html) {
                        $('#goods').append(html).parent().fadeIn("fast");
                        $('#button').val('Выберите товар!');
                    }
                });
            }
        };

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>