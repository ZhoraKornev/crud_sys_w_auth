<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Системa учёта картриджей</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
    <link rel='stylesheet' href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" type='text/css' media='all' />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/datatables.css">
    <script type="text/javascript" charset="<?php echo base_url(); ?>assets/js/datatables/datatables.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatables/datatables.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/font-awesome.css" type='text/css' media='all' />
</head>
<body>
<div class="modal-title">
    <h1 class="text-center">Системa учёта картриджей  <span class='fa fa-list'></span></h1>
    <a href="<?php echo base_url();?>login/logout">
    <button type="button" class="btn " style="border:1px dashed grey; float: right; margin: 0.6%">Выход из системы <span class="fa fa-sign-out"></span> </button>
    </a>
    <a href="<?php echo base_url(); ?>"><button class="btn" style="border:1px dashed grey; float: right; margin: 0.6%">Вернись на главную <span class="fa fa-home"></span></button></a>
</div>
<table class="table table-hover table-bordered table-striped table-condensed" id="itemlist">
    <?php
    if(!empty($cartridges) && isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $realname = ($this->session->userdata['logged_in']['realname']);
    $access = ($this->session->userdata['logged_in']['access']);
    $display = 'none';
    if ($access == 2)
    {
        $display = '';
    }
    ?>
<div class="container" style="border:2px dashed grey; float: inherit; margin: 10px">
        <?php
        echo " Добро пожаловать в Систему учёта картриджей  <b>" . $realname . "!</b>";
        echo "<br/>";
        echo "Твоё имя пользователя: " . $username;
        echo "<br/>";
        echo "Твой уровень доступа: " . $access;
        echo "<br/>";
        ?>
</div>
    <?php echo $this->session->flashdata('msg'); ?>
    <thead>
    <tr class="table-info">
        <th>id</th>
        <th>Отдел-владелец</th>
        <th>Бренд</th>
        <th>Марка</th>
        <th>Код</th>
        <th>Кто заправил</th>
        <th>Состояние</th>
        <th>Примечание</th>
        <th colspan="3" class="text-center">Вес</th>
        <th colspan="2" class="text-center">ДАТА</th>
        <th class="no-sort">Изменить эл.</th>
        <th>ВС</th>
    </tr>
    <tr class="text-center table-info ">
        <th></th>
        <th>Где установлен</th>
        <th></th>
        <th></th>
        <th></th>
        <th>Сервисный центр</th>
        <th></th>
        <th></th>
        <th>до</th>
        <th>пос</th>
        <th>Раз</th>
        <th>Прихода</th>
        <th>Ухода</th>
        <th class="no-sort">РЕД/УД/ИСТ</th>
        <th>ВС</th>
    </tr>
    <tfoot>
    <tr class="table-info">
        <th>id</th>
        <th>Отдел-владелец</th>
        <th>Бренд</th>
        <th>Марка</th>
        <th>Код</th>
        <th>Кто заправил</th>
        <th>Состояние</th>
        <th>Примечание</th>
        <th></th>
        <th></th>
        <th></th>
        <th>ухода</th>
        <th>прихода</th>
        <th class="no-sort">Изменить</th>
        <th>ВС</th>
    </tr>
    </tfoot>
    <tbody>
    <?php
    $i = 1;
    foreach ($cartridges as $cartridge)
    {
        $id = $cartridge['id'];                                ?>
        <tr>
            <td><?php echo $cartridge['id'] ?></td>
            <td><?php echo $cartridge['owner'] ?></td>
            <td><?php echo $cartridge['brand'] ?></td>
            <td><?php echo $cartridge['marks'] ?></td>
            <td><?php echo $cartridge['code'] ?></td>
            <td><?php echo $cartridge['servicename'] ?></td>
            <td><?php if ($cartridge['technical_life'] == 1){echo "Рабочий";} else {echo "Выведен из работы";} ?></td>
            <td><?php echo $cartridge['comments'] ?></td>
            <td><?php echo $cartridge['weight_before'] ?></td>
            <td><?php echo $cartridge['weight_after'] ?></td>
            <td><?php echo $cartridge['weight_before'] - $cartridge['weight_after'] ?></td>
            <td><?php echo $cartridge['date_outcome'] ?></td>
            <td><?php echo $cartridge['date_income'] ?></td>
            <td>
                <a href="<?php echo base_url(); ?>cartridge/updatedetails/<?php echo $cartridge["id"]?>">
                    <button type="button" class="btn btn-success" style="display: <?php echo $display?>" ><span class="fa fa-pencil"></span></button>
                </a>
                <button class="btn btn-danger" style="display: <?php echo $display?>" onclick="delete_item(<?php echo $id;?>) "><span class="fa fa-remove" ></span></button>
                <a href="<?php echo base_url(); ?>cartridge/story/<?php echo $id?>">
                    <button type="button" class="btn btn-info"><span class="fa fa-history"></span></button>
                </a>
            </td>
            <td name="inservice"><?php echo $cartridge['inservice'] ?></td>
        </tr>
        <?php                   $i++;                        }                    ?>
    </tbody>
</table>
<div class="text-center">
    <a href="<?php echo base_url(); ?>cartridge/addcartridgedata"><button class="btn btn-primary">Добавить картридж</button></a>
</div>
<?php
}    else     {        ?>
    <p class="alert alert-danger text-center">В базе данных нет записей</p>
<?php                    }                    ?>
<script type="text/javascript" language="javascript">
    var inservice = document.getElementsByName("inservice"),
        length = inservice.length;
    for(i=0; i<length;i++)
    {
        if (inservice[i].innerText == 1)
        {
            inservice[i].className = 'bg-danger';
            inservice[i].parentNode.className = 'bg-warning';
        }
    }
    $('#itemlist').DataTable(
        {
            paging: false,
            //scrollY: 400,
            select: true,
            "order": [[14,"desc"],[11,"asc"],[12,"asc"]],
            columnDefs: [                { targets: 'no-sort', orderable: false }            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Russian.json"
            }
        });
    function delete_item(id)
    {
        if(confirm('Точно удалить элемент?'))
        {
            // ajax delete data from database
            $.ajax({
                url : "<?php echo site_url('cartridge/deletedetails')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    alert ('Функция выполнила свою работу');
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Произошла неведомая ошибка');
                }
            });

        }
    }
</script>
</body>
</html>