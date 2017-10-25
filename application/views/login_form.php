<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
    <title>Вход в систему</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/font-awesome.css" type='text/css' media='all' />
</head>
<body>
<?php echo form_open('login/user_login_process'); ?>
<div class="container text-center">
    <h1>    Форма входа в систему учёта картриджей  <span class="fa fa-user-circle"></span> </h1>
    <?php echo $this->session->flashdata('msg'); ?>
    <?php echo validation_errors('<div class ="alert alert-danger">','</div>');?>
    <form action="" method="post">
        <div class="bg-info form-group text-left">
            <label for="username" >Пользователь:</label>
            <input class="form-control" name="username" id="username" type="text" placeholder="Пользователь">
        </div>
        <div class="bg-secondary form-group text-left">
            <label for="password" class="label-default" >Пароль:</label>
            <input class="form-control" name="password" id="password" type="password" placeholder="**********">
        </div>
        <button class="btn btn-primary" name="submit">Логин(если получится)</button>
        <?php echo form_close(); ?>
</form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>
