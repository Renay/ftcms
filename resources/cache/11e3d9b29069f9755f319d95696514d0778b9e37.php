<div class="modal" role="dialog" style="position: relative; display:block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title pull-left">Редактирование товара <?php echo e($name); ?></h4>
            </div>
            <div class="modal-body">
                <form id="edit_product" action="/admin/goods/update" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="id" value="<?php echo e($id); ?>" hidden title="">
                                <label for="name" class="control-label">Название</label>
                                <input name="name" id="name" type="text" class="form-control" value="<?php echo e($name); ?>" placeholder="Название товара" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="control-label">Цена</label>
                                <input name="price" id="price" type="number" class="form-control" value="<?php echo e($price); ?>" placeholder="Цена товара" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="count" class="control-label">Количество (шт.)</label>
                                <input name="count" id="count" type="number" class="form-control" placeholder="Количество" value="<?php echo e($count); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="priority" class="control-label">Приоритет</label>
                                <input name="priority" id="priority" type="number" class="form-control" placeholder="от 1 до 999" value="<?php echo e($priority); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="purchase" class="control-label">Доплата</label>
                                <select name="purchase" id="purchase" class="form-control" required>
                                    <option <?php echo e(($purchase < 1) ?'': 'selected'); ?> value="1">Да</option>
                                    <option <?php echo e(($purchase > 0) ?'': 'selected'); ?> value="0">Нет</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="server" class="control-label">Сервер</label>
                                <select name="server_id" id="server" class="form-control" required>
                                    <option value="0" disabled selected>Не выбран</option>
                                    <?php $__currentLoopData = $servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $server): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(!($server['id'] == $server_id)?'':'selected'); ?> value="<?php echo e($server['id']); ?>"><?php echo e($server['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>; }}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category" class="control-label">Категория</label>
                                <select name="categories_id" id="category" class="form-control" required>
                                    <option value="0" disabled selected>Не выбрана</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(!($category['id'] == $categories_id)?'':' selected'); ?> value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cmd">Команды:</label>
                                <textarea class="form-control" wrap="soft" name="commands" rows="5"
                                          id="cmd" placeholder="Введите каждую новую команду с новой строки"><?php echo e(nr2ds($commands, ['<br />'])); ?></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button type="button" onclick="Goods.onUpdate(<?php echo e($id); ?>)" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->