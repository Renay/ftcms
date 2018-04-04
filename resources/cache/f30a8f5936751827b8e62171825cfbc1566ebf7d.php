<?php $__env->startSection('title', 'Сервера'); ?>

<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="row">
                <h3 class="col-md-offset-2 title1">Сервера
                    <a class="btn btn-primary pull-right" style="margin-right: 20%;" onclick="Server.new(event);">Добавить</a>
                </h3>

                <div class="col-md-offset-2 col-md-8 col-sm-12 p-0">
                    <?php if(sizeof($servers)): ?>
                        <div id="server" class="widget-shadow">
                            <?php $__currentLoopData = $servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $server): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('admin.servers.server', $server, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <?php echo $__env->make('errors.empty', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <h4 class="modal-title pull-left">Добавление сервера</h4>
                </div>
                <div class="modal-body">
                    <form id="new_server" action="/admin/servers/create" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Название</label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Введите название" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="host" class="control-label">Хост</label>
                                    <input name="host" id="host" type="text" class="form-control" placeholder="Введите хост" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="port" class="control-label">Порт</label>
                                    <input name="port" id="port" type="number" class="form-control" placeholder="Введите порт" required>
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
                        <button type="button" onclick="Server.onCreate()" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $('[data-password]').on('click', function(e) {
            e.preventDefault();
            if ($(this).hasClass('view-pass')) {
                $(this).text('•••••••••').removeClass('view-pass');
            } else {
                $(this).text($(this).data('password')).addClass('view-pass');
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>