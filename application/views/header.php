<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/font-awesome.css" type='text/css' media='all' />
</head>


<body>
<header>
    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/img/printer.png" alt="logo"></a>
</header>

<div class="container">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a href="<?php echo base_url(); ?>">
            <button class="btn btn-outline-success" type="button" ><span class="fa fa-home"></span> Домой</button>
        </a>
        <a class="blog-nav-item" href="<?php echo base_url(); ?>login/user_registration_show">Регистрация в системе <span class="fa fa-plus"></span> </a>
        <a class="blog-nav-item" href="<?php echo base_url(); ?>login">Логин в систему  <span class="fa fa-sign-in"></a>
        <a class="blog-nav-item" href="<?php echo base_url(); ?>main/auth_systems">Система учёта пользователей <span class='fa fa-users'></a>
        <a class="blog-nav-item" href="<?php echo base_url(); ?>main/instruction">Инструкция  <span class='fa fa-university'></a>
        <a href="https://habrahabr.ru/">
            <button class="btn btn-sm align-middle btn-outline-secondary" type="button" >«habrahabr»</button>
        </a>
    </nav>
</div>