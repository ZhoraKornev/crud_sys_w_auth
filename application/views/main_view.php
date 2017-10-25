<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Стартовая страница</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
</head>
<body>
<div class="container">
    <div class="blog-header">
        <h1 class="blog-title">Главная страница учёта техники</h1>
        <p class="lead blog-description">Данная страница является отправной точкой для входа в системы учета техники.</p>
        <p class="lead blog-description">Редактирование этой страницы происходит только через редактирование кода страницы.</p>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">Что работает</h2>
                <p class="blog-post-meta">January 1, 2018 by <a href="#">Програмист</a></p>
                <p>Пока что разработана и введена в эксплуатацию система учета картриджей.
                Используя верхнее меню вы можете регистрироваться и логниться в систему учёта техники</p>
                <hr>
                <p>Всё пока что работает в тестовом режиме если найдете ошибку <a href="#">обращайтесь</a>.                    <br>
                    <hr>
                <blockquote>
                <p>В сказке для программистов поросята спасаются в домике из говна и палок, который они ремонтируют быстрее, чем волк его ломает.</p>
                </blockquote>
            </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Про старницу</h4>
                <p>— <em> Чем отличается законченный программист от простого пользователя?</em>  — Пользователь думает, что в килобайте 1000 байт, а Программист думает, что в километре 1024 метра.</p>
            </div>
            <div class="sidebar-module">
                <h4>Архив новостей</h4>
                <ol class="list-unstyled">
                    <li><a href="https://habrahabr.ru/post/235175/">Делаем авторизацию на Codeigniter 2.0 при помощи ajax и HMVC</a></li>
                    <li><a href="https://habrahabr.ru/post/151320/">Прибитый к низу футер своими руками</a></li>
                    <li><a href="http://www.phpcodify.com/codeigniter-crud-using-ajax-bootstrap-models-and-mysql/">CodeIgniter CRUD using Ajax,Bootstrap,Models and MySQL</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Что нибудь ещё?</h4>
                <ol class="list-unstyled">
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->
</div><!-- /.container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>