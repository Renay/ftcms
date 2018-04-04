<div class="modal" role="dialog" style="position: relative; display:block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title pull-left">Редактирование сервера <?php echo e($name); ?></h4>
            </div>
            <div class="modal-body">
                <form id="edit_server" action="/admin/servers/update" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="id" value="<?php echo e($id); ?>" hidden title="">
                                <label for="name" class="control-label">Название</label>
                                <input name="name" id="name" type="text" class="form-control" value="<?php echo e($name); ?>" placeholder="Введите название" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="host" class="control-label">Хост</label>
                                <input name="host" id="host" type="text" class="form-control" value="<?php echo e($host); ?>" placeholder="Введите хост" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="port" class="control-label">Порт</label>
                                <input name="port" id="port" max="5" type="number" class="form-control" placeholder="Введите порт" value="<?php echo e($port); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="control-label">Пароль</label>
                                <input name="password" id="password" type="text" class="form-control" placeholder="Введите пароль" value="<?php echo e($password); ?>" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button type="button" onclick="Server.onUpdate(<?php echo e($id); ?>)" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->