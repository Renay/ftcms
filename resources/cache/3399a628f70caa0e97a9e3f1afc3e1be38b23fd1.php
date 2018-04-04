<div class="modal" role="dialog" style="display: block; position: relative;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title pull-left">Описание для товара <?php echo e($name); ?></h4>
            </div>
            <div class="modal-body">
                <form id="edit_description" action="/admin/goods/desc" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" name="id" value="<?php echo e($id); ?>" hidden title="" />
                                <input type="text" id="name" value="<?php echo e($name); ?>" hidden title="" />
                                <textarea class="form-control" wrap="soft" name="description" rows="10"
                                          placeholder="Введите описание для данного товара..."><?php echo e(nr2ds($description, ['<br />'])); ?></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="Goods.onDescription()" class="btn btn-success">Сохранить</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->