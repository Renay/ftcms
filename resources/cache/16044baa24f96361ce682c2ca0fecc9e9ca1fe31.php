<div class="modal" role="dialog" style="position: relative; display:block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title pull-left">Редактирование категории <?php echo e($category['name']); ?></h4>
            </div>
            <div class="modal-body">
                <form id="edit_category" action="/admin/categories/update" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Название</label>
                                <input name="id" type="number" value="<?php echo e($id); ?>" hidden>
                                <input name="name" id="name" type="text" class="form-control" value="<?php echo e($name); ?>"  placeholder="Название категории" reqiored>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="priority" class="control-label">Приоритет</label>
                                <input name="priority" id="priority" type="number" class="form-control" value="<?php echo e($priority); ?>" placeholder="Приоритет категории" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button type="button" onclick="Category.onUpdate(<?php echo e($id); ?>)" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->