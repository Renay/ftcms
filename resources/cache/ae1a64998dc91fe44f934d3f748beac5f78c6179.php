<div class="modal" role="dialog" style="position: relative; display:block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title pull-left">Редактирование пользователя <?php echo e($username); ?></h4>
            </div>
            <div class="modal-body">
                <form id="edit_user" class="edit_user" action="/admin/users/update" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="id" type="number" value="<?php echo e($id); ?>" hidden title="">
                                <label for="name" class="control-label">Имя пользователя</label>
                                <input name="username" id="name" type="text" class="form-control" value="<?php echo e($username); ?>" placeholder="Введите имя" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="passwd" class="control-label">Пароль</label>
                                <input name="password" id="passwd" type="password" class="form-control" placeholder="Введите пароль" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roles" class="control-label">Права</label>
                                <select name="roles" id="roles" class="form-control" required>
                                    <option value="0" disabled>Не выбрано</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role); ?>"><?php echo e($role); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="console" class="control-label">Консоль</label>
                                <select name="rights_console" id="console" class="form-control" required>
                                    <option value="1">Есть</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button type="button" onclick="User.onUpdate(<?php echo e($id); ?>);" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->