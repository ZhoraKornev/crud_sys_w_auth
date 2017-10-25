<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование</title>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/main.css" type='text/css' media='all' />
</head>
<body>
<div class="col-lg-auto">
    <div class="container">
        <div class="form-container">
            <div class="form-title">
                <h1 class="text-center">Редактирование</h1>
            </div>
            <?php if (isset($this->session->userdata['logged_in'])){?>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php foreach ($data as $key => $value) {
                ?>
                <form action="<?php echo base_url();?>cartridge/updatedetails/<?php echo $value['id']; ?>" method="post">
                    <div class="form-group">
                        <label class="control-label" for="owner">Отдел установки</label>
                        <input type="text" class="form-control" id="owner" name="owner" value="<?php echo $value['owner']; ?>" required="">
                    </div>
                    <!--<div class="form-group">
                        <label class="control-label" for="marks">Марка/шифр</label>
                        <input type="text" class="form-control" id="marks" name="marks" value="<?php echo $value['marks']; ?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="brand">Бренд</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $value['brand']; ?>" required="">
                    </div> -->
                    <div class="form-group">
                        <label class="control-label" for="code">Код</label>
                        <input type="text" class="form-control" id="code" name="code" value="<?php echo $value['code']; ?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="servicename">Какой из сервис центров делал работу</label>
                        <input type="text" class="form-control" id="servicename" name="servicename" value="<?php echo $value['servicename']; ?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="technical_life">Тех.состояние</label>
                        <select class="form-control" id="technical_life" name="technical_life" placeholder="Живой/не живой " value="<?php echo $value['technical_life']; ?>" required="">
                            <option value="1"> Живой</option>
                            <option value="0"> не живой</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="weight_before">Вес до заправки(по умолч:111)</label>
                        <input type="number" class="form-control" id="weight_before" name="weight_before" value="<?php echo $value['weight_before']; ?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="weight_after">Вес после заправки</label>
                        <input type="number" class="form-control" id="weight_after" name="weight_after" value="<?php echo $value['weight_after']; ?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="date_outcome">Дата отправки в сервис</label>
                        <input type="date" class="form-control" id="date_outcome" name="date_outcome" value="<?php echo $value['date_outcome']; ?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="date_income">Дата прихода из сервиса</label>
                        <input type="date" class="form-control" id="date_income" name="date_income" value="<?php echo $value['date_income']; ?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="comments">Примечание//Коментарии</label>
                        <input type="text" class="form-control" id="comments" name="comments" value="<?php echo $value['comments']; ?>">
                    </div>


                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" id="submit" value="Обновить данные о картридже">
                    </div>

                </form>
                <?php            }            }?>
            <div class="add-cartridge text-center">
                <a href="<?php echo base_url(); ?>cartridge/"><button class="btn btn-success">Вернись</button></a>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>