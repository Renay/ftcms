<?php $__env->startSection('title', 'Пользователи'); ?>

<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="grids">
                <h3 class="title1">Пользователи
                    <a class="btn btn-primary pull-right" style="margin-right: 2%;" onclick="User.new(event);">Добавить</a>
                </h3>
                <div id="users" class="padding-0">
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php echo $__env->make('admin.users.user', $user, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h1>В базе нет пользователей.</h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" role="dialog" style="position: relative;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title pull-left">Добавление пользователя</h4>
                </div>
                <div class="modal-body">
                    <form id="new_user" action="/admin/users/create" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Имя пользователя</label>
                                    <input name="username" id="name" type="text" class="form-control" placeholder="Введите имя" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="roles" class="control-label">Права</label>
                                    <select name="roles" id="roles" class="form-control" required>
                                        <option value="0">Не выбраны</option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role); ?>"><?php echo e($role); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="passwd" class="control-label">Пароль</label>
                                    <input name="password" id="passwd" type="password" class="form-control" placeholder="Введите пароль" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="button" onclick="User.onCreate()" class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>