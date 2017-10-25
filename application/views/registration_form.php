<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
    <title>Форма регистрации в системе учёта картриджей</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/font-awesome.css" type='text/css' media='all' />
</head>
<body>

<div class="container text-center">
    <h1>    Форма регистрации в системе учёта картриджей <span class="fa fa-user-plus"</span></h1>
    <span class="glyph gly
    <p style="font-size: 12px">При регистрации вы получите самый низкий уровень доступа. Для повышения уровня доступа Свяжитесь с администратором сайта.</p>
    <?php echo validation_errors('<div class ="alert alert-danger">','</div>');?>
    <?php echo $this->session->flashdata('msg'); ?>
    <?php     echo form_open('login/new_user_registration');     ?>
    <form action="" method="post">
        <div class="form-group bg-success text-left">
            <label for="username" > Никнейм (будет использоваться для входа, русскими или английскими):</label>
            <input class="form-control" name="username" id="username" type="text" placeholder="Пользователь">
        </div>
        <div class="form-group bg-info text-left">
            <label for="realname" class="label-default">Имя пользователя (пишется в лог+приветствие):</label>
            <input class="form-control" name="realname" id="realname" type="text" placeholder="Твоё имя">
        </div>
        <div class="form-group bg-secondary text-left">
            <label for="password" class="label-default">Пароль:</label>
            <input class="form-control" name="password" id="password" type="password" placeholder="**********">
        </div>
        <div class="text-center">
            <button class="btn btn-primary" name="register">Зарегистрироваться(но это не точно)</button>
        </div>
    </form>
    <?php echo form_close();    ?>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>


</body>
</html>