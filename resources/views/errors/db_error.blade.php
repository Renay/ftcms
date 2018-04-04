<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="<?=asset('images/favicon_1.ico')?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <title>500 | Server not found</title>

    <link href="<?=asset('admin/css/bootstrap.css')?>" rel="stylesheet" type="text/css" />
    <style>
        * {
            outline: none !important;
        }

        body {
            font-family: "Roboto", sans-serif;
            font-size: 14px;
            background: #f5f5f5;
            margin: 0;
            overflow-x: hidden;
        }

        .btn-success, .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .btn-success.focus, .btn-success:active, .btn-success:focus, .btn-success:hover, .open > .dropdown-toggle.btn-success {
            background-color: #2bbbad !important;
            border: 1px solid #2bbbad !important;
        }

        .btn-primary, .btn-success, .btn-default, .btn-info, .btn-warning, .btn-danger, .btn-inverse, .btn-purple, .btn-pink {
            color: #ffffff !important;
        }

        .btn {
            border-radius: 2px;
            outline: none !important;
            font-family: "Roboto", sans-serif;
            font-size: 15px;
        }

        .waves-effect {
            position: relative;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
            vertical-align: middle;
            z-index: 1;
            will-change: opacity, transform;
            -webkit-transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
            -ms-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
        }

        .badge, .btn, .label, .nav-user img, .contacts-list .avatar img, .morris-hover.morris-default-style, .conversation-list .chat-avatar img, .alert {
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        .btn-success {
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        a,
        a:hover,
        a:active {
            color: #FFFFFF;
            text-decoration: none;
            outline: 0;
            font-weight: 500;
        }

        p {
            line-height: 1.6;
            margin: 0 0 10px;
        }

        h2 {
            line-height: 35px;
        }

        .account-pages {
            background: url({{asset('admin/images/bg.png')}});
            position: absolute;
            background-size: cover;
            height: 100%;
            width: 100%;
            top: 0;
        }

        .wrapper-page {
            margin: 5% auto;
            position: relative;
            width: 420px;
        }
        .ex-page-content .text-error {
            color: #252932;
            font-size: 98px;
            font-weight: 700;
            line-height: 150px;
        }
        .text-white {
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="account-pages" ></div>
<div class="clearfix"></div>

<div class="wrapper-page">
    <div class="ex-page-content text-center">
        <div class="text-error" style="">
            <span style="color:#4285f4;">500</span>
        </div>
        <h2 class="text-white">Ошибка!</h2><br>
        <p style="color: #98a6ad;">Произошла ошибка.. Нет подключения к базе данных, сообщите об этом администратору или <a href="//mcperfects.com" target="_blank" class="text-white">разработчику</a></p>
    </div>
</div>
</body>
</html>