<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>История о элементе</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
    <link rel='stylesheet' href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" type='text/css' media='all' />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/datatables.css">

    <script type="text/javascript" charset="<?php echo base_url(); ?>assets/js/datatables/datatables.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatables/datatables.js"></script>
</head>
<body>
<div class="col-lg-auto">
            <div class="form-title">
                <h1 class="text-center">История о элементе   <?php print_r($item[0]['marks']) ?></h1>
            </div>
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="wrapper">
                        <div class="table-data">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped table-condensed" id="storylist">
                                    <?php if(isset($stories[0]['id']) && isset($this->session->userdata['logged_in']))  {  ?>
                                    <thead class="table-success">
                                    <tr>
                                        <th>id</th>
                                        <th>Отдел-владелец</th>
                                        <th class="no-sort">id картриджа</th>
                                        <th>Кто заправил</th>
                                        <th>Состояние</th>
                                        <th>Вес до</th>
                                        <th>Вес после</th>
                                        <th>Дата ухода</th>
                                        <th>Дата прихода</th>
                                        <th>Дата внесения изменений</th>
                                    </tr>
                                    <tfoot class="table-success">
                                    <tr>
                                        <th>id</th>
                                        <th>Отдел-владелец</th>
                                        <th class="no-sort">id картриджа</th>
                                        <th>Кто заправил</th>
                                        <th>Состояние</th>
                                        <th>Вес до</th>
                                        <th>Вес после</th>
                                        <th>Дата ухода</th>
                                        <th>Дата прихода</th>
                                        <th>Дата внесения изменений</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 1;  foreach ($stories as $story){
                                        $id = $story['id'];                            ?>
                                        <tr>
                                            <td><?php echo $story['id']?></td>
                                            <td><?php echo $story['owner'] ?></td>
                                            <td><?php echo $story['id_item']?></td>
                                            <td><?php echo $story['servicename'] ?></td>
                                            <td><?php if ($story['technical_life'] == 1){echo "Живой";} else {echo "Труп";} ?></td>
                                            <td><?php echo $story['weight_before'] ?></td>
                                            <td><?php echo $story['weight_after'] ?></td>
                                            <td><?php echo $story['date_outcome'] ?></td>
                                            <td><?php echo $story['date_income'] ?></td>
                                            <td><?php echo $story['date_of_changes'] ?></td>
                                        </tr>
                                        <?php                            $i++;                        }                        ?>
                                    </tbody>
                                </table>
                                <form action="<?php echo base_url();?>cartridge/story/<?php echo $item[0]['id']; ?>" method="post">
                                    <div class="bg-info form-group">
                                        <label class="form-inline font-weight-bold" for="comments">Примечание//Коментарии</label>
                                        <input type="text" class="form-control" id="comments" name="comments" value="<?php echo($item[0]['comments']); ?>">
                                    </div>
                                </form>
                                <div class="bg-info form-group">
                                    <label class="form-inline font-weight-bold" for="log">Текстовый лог в котором отображаются изменения происходившие в значениях элемента </label>
                                    <textarea class="form-control" rows="10" id="log"><?php echo $story['log']; ?></textarea>
                                </div>
                                <div class="bg-info form-group">
                                    <label class="form-inline font-weight-bold" for="log_full">Полный текстовый журнал изменений сюда выводится информация о значениях. <br> Было >>> Стало</label>
                                    <textarea class="form-control" rows="15" id="log_full"><?php echo $story['log_full']; ?></textarea>
                                </div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <p class="alert alert-danger text-center">В истории ещё нет записей</p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <div class="add-cartridge text-center">
                <a href="<?php echo base_url(); ?>cartridge/"><button class="btn btn-success">Вернись</button></a>
            </div>
<script type="text/javascript" language="javascript">

$('#storylist').DataTable(
    {
        paging: false,
        //scrollY: 400,
        select: true,
        "order": [[0,"asc"]],
        columnDefs: [                { targets: 'no-sort', orderable: false }            ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Russian.json"
        }
    });

</script>

</body>


</html>