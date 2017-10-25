<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление//Системa учёта картриджей</title>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/main.css" type='text/css' media='all' />
</head>
<body>
<div class="col-lg-auto">
    <div class="container">
        <div class="form-container">
            <div class="form-title">
                <h1 class="text-center">Добавление</h1>
            </div>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo validation_errors('<div class ="alert alert-danger">','</div>');?>
            <form action="<?php echo base_url(); ?>cartridge/addcartridgedata" method="post">
                <div class="form-group ">
                    <label class="control-label" for="owner">Чей --></label>
                    <input type="text" class="form-control" id="owner" name="owner" placeholder="Отдел установки" required="">
                </div>
                <div class="form-group">
                    <label for="marks">Марка/шифр</label>
                    <input type="text" class="form-control" id="marks" name="marks" placeholder="марка например CW-C725M" required="">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="brand">Бренд</label>
                    <select class="form-control" id="brand" name="brand" placeholder="Фирма изготовитель" required="">
                        <option value="ColorWay"> ColorWay</option>
                        <option value="HP">HP </option>
                        <option value="Canon">Canon </option>
                        <option value="без бренда">без бренда </option>
                        <option value="Samsung">Samsung </option>
                        <option value="неизвестно"> неизвестно</option>
                    </select>

                </div>
                <div class="form-group">
                    <label class="form-control-lg" for="code">Код</label>
                    <input type="number" class="form-input" id="code" name="code" placeholder="код из 4 цифр на наклейке">

                </div>

                <div class="form-group">
                    <label class="control-label" for="servicename">Исполнитель</label>
                    <select autofocus class="form-control" id="servicename" name="servicename" placeholder="Какой из сервис центров делал работу" required="">
                        <option value="Элит-Сервис"> Элит-Сервис</option>
                        <option value="неизвестно"> неизвестно</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="technical_life">Тех.состояние</label>
                    <select class="form-control" id="technical_life" name="technical_life" placeholder="Живой/не живой " required="">
                    <option value="1"> Живой</option>
                    <option value="0"> не живой</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="weight_before">Вес до</label>
                    <input type="number" class="form-control" id="weight_before" name="weight_before" placeholder="Вес до заправки" required="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="weight_after">Вес после</label>
                    <input type="number" class="form-control" id="weight_after" name="weight_after" placeholder="Вес после заправки" required="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="comments">Примечание</label>
                    <input type="text" class="form-control" id="comments" name="comments" placeholder="Коментарии">
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" id="submit" value="Отправить в БД">
                </div>
            </form>
            <div class="add-cartridge text-center">
                <a href="<?php echo base_url(); ?>cartridge/"><button class="btn btn-success">Вернуться на главную</button></a>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>