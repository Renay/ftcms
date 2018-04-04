<!DOCTYPE HTML>
<html>
<head>
<title>Login :: {{Setting::get('name_site')}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cool script minecraft, Minecraft Script, Minecraft CMS, Autodonate Minecraft, Майнкрафт автодонат, авто донат, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web script, for Nokia, Samsung, LG, SonyEricsson, Motorola" />
<!-- Bootstrap Core CSS -->
<link href="{{asset('admin/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{asset('admin/js/jquery-1.12.0.min.js')}}"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{asset('admin/css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<!--//end-animate-->
<!-- Metis Menu -->
<link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!-- main content start-->
		<div id="page-wrapper" style="margin: 0">
			<div class="main-page login-page">
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Приветствуем в Админ панель проекта {{Setting::get('name_site')}}!  <br> Вернутся на главную? <a href="/">Жми Сюда »</a> </h4>
					</div>
					<div class="login-body">
						<form id="login-form" method="POST" action="/admin/auth">
							<input type="text" name="username" class="user" placeholder="Введите логин" required="">
							<input type="password" name="password" class="lock" placeholder="Введите пароль">
							<input type="submit" onclick="Login.auth(event, this)" value="Войти">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<footer class="footer-login">
		   <p>&copy; {{date('Y')}} {{Setting::get('name_site')}}. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</footer>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="{{asset('admin/js/classie.js')}}"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="{{asset('admin/js/bootstrap.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.min.js"></script>

	<script type="text/javascript">
		var Login = {
		    auth: function(e, button) {
		        e.preventDefault();
				var form = $('#login-form');

				if ($('input').val().length < 3) {
                    return swal({
                        type: 'warning',
                        title: 'Ошибка!',
                        showConfirmButton: false,
                        timer: 2000
                    })
				}

		        $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
					statusCode: {
                        400: function() {
                            swal({
                                type: 'error',
                                title: 'Ошибка!',
								text: 'У вас нет доступа к админ-панели',
                                showConfirmButton: false,
                                timer: 2000
                            })
						},
						403: function(result) {
                            swal({
                                type: 'error',
								title: 'Ошибка!',
                                text: 'Введенные данные не верны.' +
                                ' Проверьте их правильность',
                                showConfirmButton: false,
                                timer: 2000
                            })
						},
					},
					beforeSend: function() {
						$(button).attr('disabled', '');
					},
                    success: function() {
                        window.location.reload();
                    },
                    complete: function() {
                        $(button).removeAttr('disabled');
                    }
		        });
			}
		};
	</script>
</body>
</html>