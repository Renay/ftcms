<!--
Сайт является собственностью Perfect Team
Автор системы: http://mcperfects.com/
Адрес группы ВКонтакте: http://vk.com/
--------------------------------------------------------------------
Design by: W3layouts
URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $__env->yieldContent('title'); ?> // <?php echo e(Setting::get('name_site')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" /
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="<?php echo e(asset('admin/css/font-awesome.css')); ?>" rel="stylesheet"  type="text/css">
    <!-- Custombox styles -->
    <link href="<?php echo e(asset('admin/custombox/css/custombox.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('admin/css/bootstrap.css')); ?>" rel="stylesheet" type='text/css' />
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet" type='text/css' />
    <link href="<?php echo e(asset('admin/css/animate.css')); ?>" rel="stylesheet" type="text/css" media="all">
    <!-- js-->
    <script src="<?php echo e(asset('admin/js/jquery-1.12.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-migrate-1.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/modernizr.custom.js')); ?>"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel="stylesheet" type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="<?php echo e(asset('admin/css/animate.css')); ?>" rel="stylesheet" type="text/css" media="all">
    <script src="<?php echo e(asset('admin/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/highcharts.js')); ?>" type="text/javascript"></script>
    <script>
        new WOW().init();

        Highcharts.setOptions({
            chart: { backgroundColor: false },
            tooltip: {
                headerFormat: '',
                backgroundColor: 'rgba(0,0,0,.6)',
                shadow: false,
                borderWidth: 0,
                style: {
                    color: '#fff',
                    padding: '10px',
                    fontSize: '90%'
                }
            },
            credits: { enabled: false },
            title: {text: ''}
        });
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->
    <script src="<?php echo e(asset('admin/js/metisMenu.min.js')); ?>"></script>
    <link href="<?php echo e(asset('admin/css/custom.css')); ?>" rel="stylesheet">
    <!--//Metis Menu -->
</head>
<body class="cbp-spmenu-push">
<div class="main-content">

    <?php echo $__env->make('admin.navigation.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- header-starts -->
    <div class="sticky-header header-section ">
        <div class="header-left">
            <!--toggle button start-->
            <button id="showLeftPush" class="hidden-lg hidden-md"><i class="fa fa-bars"></i></button>
            <!--toggle button end-->
            <!--logo -->
            <div class="logo">
                <a href="/admin">
                    <h1 style="text-transform: uppercase;"><?php echo e(Setting::get('name_site')); ?></h1>
                    <span>AdminPanel</span>
                </a>
            </div>
            <!--//logo-->
            <!--search-box-->
            <div class="search-box hidden-sm hidden-xs hidden-md">
                <a class="btn btn-primary" href="//mcperfects.com" target="_blank">Разработчик</a>
            </div><!--//end-search-box-->
            <div class="clearfix"> </div>
        </div>
        <div class="header-right hidden-xs">
            <!--notification menu end -->
            <div class="profile_details">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">
                                <div class="user-name">
                                    <p class="uppercase"><?php echo e(User::get()->username); ?></p>
                                    <span>Administrator</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li> <a href="/admin/settings" data-fastlink="true"><i class="fa fa-cog"></i> Settings</a> </li>
                            <li> <a href="/admin/logout" data-fastlink="true"><i class="fa fa-sign-out"></i> Logout</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //header-ends -->
    <?php echo $__env->yieldContent('content'); ?>
    <!--footer-->
    <div class="footer">
        <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
    </div>
    <!--//footer-->
</div>
<!-- Classie -->
<script src="<?php echo e(asset('admin/js/classie.js')); ?>"></script>
<script type="text/javascript">
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
    };

    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
    }

</script>



<!-- Bootstrap Core JavaScript -->
<script src="<?php echo e(asset('admin/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/custom.js')); ?>"></script>

<!--scrolling js-->
<script src="<?php echo e(asset('admin/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery-ui-1.12.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/custombox/js/custombox.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/custombox/js/legacy.min.js')); ?>"></script>
<!--//scrolling js-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.min.js"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<script src="<?php echo e(asset('admin/js/ajax.js')); ?>" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover()
        })
    </script>

</body>
</html>