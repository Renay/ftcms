<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?=asset('images/favicon.ico')?>">

        <title>Login to Admin Dashboard :: <?=config('app.name')?></title>

        <link href="<?= asset('css/bootstrap.min.css') ?>"  rel="stylesheet" type="text/css" />
        <link href="<?= asset('css/icons.css') ?>"  rel="stylesheet" type="text/css" />
        <link href="<?= asset('css/style.css?v='. rand(1, 9999)) ?>"  rel="stylesheet" type="text/css" />

        <script src="<?= asset('js/modernizr.min.js') ?>"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div style="height: 100px;"><div id="error" class="alert alert-danger" style="display:none;"></div></div>
            <div class="card-box">
                <div class="panel-heading">
                    <h4 class="text-center"> Вход в панель <strong><?=config('app.name')?></strong></h4>
                </div>
                <div class="p-20 p-b-0">
                    <form class="form-horizontal m-t-20" method="POST" action="/admin/auth">
                        <div class="form-group-custom">
                            <input type="text" id="user-name" name="username" required="required"/>
                            <label class="control-label" for="user-name">E-Mail</label><i class="bar"></i>
                        </div>

                        <div class="form-group-custom">
                            <input type="password" id="user-password" name="password" required="required"/>
                            <label class="control-label" for="user-password">Password</label><i class="bar"></i>
                        </div>

                        <div class="form-group ">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Запомнить меня
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button onclick="Login.auth(event)" class="btn btn-success btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Войти
                                </button>
                            </div>
                        </div>
                        <!--div class="form-group m-t-30 m-b-0">
                            <div class="col-12">
                                <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Забыли пароль??</a>
                            </div>
                        </div-->
                    </form>
                </div>
            </div>
            <!--div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-white">Don't have an account? <a href="page-register.html" class="text-white m-l-5"><b>Sign Up</b></a></p>
                </div>
            </div-->
            
        </div>
        
        

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?=asset('js/jquery.min.js')?>"></script>
        <script src="<?=asset('js/tether.min.js')?>"></script><!-- Tether for Bootstrap -->
        <script src="<?=asset('js/bootstrap.min.js')?>"></script>
        <script src="<?=asset('js/detect.js')?>"></script>
        <script src="<?=asset('js/fastclick.js')?>"></script>
        <script src="<?=asset('js/jquery.slimscroll.js')?>"></script>
        <script src="<?=asset('js/jquery.blockUI.js')?>"></script>
        <script src="<?=asset('js/waves.js')?>"></script>
        <script src="<?=asset('js/wow.min.js')?>"></script>

        <script src="<?=asset('js/jquery.scrollTo.min.js')?>"></script>

        <script src="<?= asset('js/jquery.core.js') ?>"></script>
        <script src="<?= asset('js/jquery.app.js') ?>"></script>

        <script type="text/javascript">
            var Login = {
                auth: function(e) {
                    e.preventDefault();
                    var $form = $('form');

                    $.ajax({
                        url: $form.attr("action"),
                        type: 'POST',
                        data: $form.serialize(),
                        success: function () {
                            $("#error").fadeOut('slow', function() {
                                $("#error").html('<strong>Успех!</strong> Все данные верны, вы авторизованы.')
                                    .removeClass('alert-danger').addClass('alert-success').fadeIn('slow');
                                window.location.reload();
                            });
                        },
                        error: function (xhr, status, error) {
                            var result = $.parseJSON(xhr.responseText);
                            $("#error").html("<strong>Ошибка!</strong> " + result.error).fadeIn('slow', function() {
                                setTimeout(function() { $('#error').fadeOut('slow') }, 3000);
                            });
                        }
                    });
                }
            };
        </script>
	</body>
</html>