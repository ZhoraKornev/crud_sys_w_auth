<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Системa учёта пользователей</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type='text/css' media='all' />
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/css/font-awesome.css" type='text/css' media='all' />
</head>
<body>
<div class="modal-title">
    <h1 class="text-center">Системa учёта пользователей <span class='fa fa-users'></span></h1>
</div>
<?php if ($logged_in){
?>
<div class="container">
    <a href="<?php echo base_url(); ?>">
    <button type="button" class="btn " style="border:1px dashed grey; float: right; margin: 0.6%">Выход из системы <span class="fa fa-sign-out"></span> </button>
    </a>
<table class="table table-hover table-bordered table-striped table-condensed">
    <?php echo $this->session->flashdata('msg'); ?>
    <thead>
    <tr class="table-info">
        <th>id</th>
        <th>login</th>
        <th>Имя пользователя</th>
        <th>Пароль</th>
        <th>Уровень доступа</th>
        <th>Операции</th>
    </tr>
    <tfoot>
    <tr class="table-info">
        <th>id</th>
        <th>login</th>
        <th>Имя пользователя</th>
        <th>Пароль</th>
        <th>Уровень доступа</th>
        <th>Операции</th>
    </tr>
    </tfoot>
    <tbody>
    <?php
    $i = 1;
    foreach ($users as $user)
    {
        $id = $user['id'];                                ?>
        <tr>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['user_name'] ?></td>
            <td><?php echo $user['user_realname'] ?></td>
            <td><?php echo $user['user_password'] ?></td>
            <td><?php echo $user['user_access'] ?></td>
            <td>
                <button type="button" class="btn btn-success" onclick="edit_item(<?php echo $id;?>) "><span class="fa fa-pencil" ></span></button>
                <button type="button" class="btn btn-danger" onclick="delete_item(<?php echo $id;?>) "><span class="fa fa-remove" ></span></button>
            </td>
        </tr>
        <?php                   $i++;                        }        }
    else
    {
        redirect(base_url().'main', 'refresh');
    }?>
    </tbody>
</table>
</div>

<script type="text/javascript" language="javascript">
    function edit_item(id)
    {
        $('#form')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('user_controller/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="user_name"]').val(data.user_name);
                $('[name="user_realname"]').val(data.user_realname);
                $('[name="user_password"]').val(data.user_password);
                $('[name="user_access"]').val(data.user_access);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                /*$('.modal-title').text('Редактирование пользователя'); // Set title to Bootstrap modal title*/
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Произошла неведомая ошибка');
            }
        });
    }
    function save()
    {
        // ajax adding data to database
        $.ajax({
            url : "<?php echo site_url('user_controller/update_details')?>",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                //if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Произошла ошибка добавления информации');
            }
        });
    }

    function delete_item(id)
    {
        if(confirm('Точно удалить элемент?'))
        {
            // ajax delete data from database
            $.ajax({
                url : "<?php echo site_url('user_controller/delete_user/')?>/"+id,
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Редактирование пользователя</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">login</label>
                            <div class="col-md-9">
                                <input name="user_name" placeholder="user_name" class="form-control" type="text" pattern=".{3,}" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Имя пользователя</label>
                            <div class="col-md-9">
                                <input name="user_realname" placeholder="user_realname" class="form-control" type="text" pattern=".{3,}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Пароль</label>
                            <div class="col-md-9">
                                <input name="user_password" placeholder="Пароль" class="form-control" type="text" required ="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Уровень доступа</label>
                            <div class="col-md-9">
                                <input name="user_access" placeholder="user_access" class="form-control" type="text" required ="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Обновить</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Вернись</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>