<div id="s<?php echo e($id); ?>" class="media-block">
    <div class="dropdown pull-right">
        <a href="#" data-toggle="dropdown" aria-expanded="true">
            <i class="fa fa-ellipsis-v text-dark"></i>
        </a>
        <ul class="dropdown-menu action float-right">
            <li>
                <a href="#" onclick="Server.edit(event, <?php echo e($id); ?>)" title="">
                    <i class="fa fa-edit text-dark"></i>
                    Редактировать
                </a>
            </li>
            <li>
                <a href="#" onclick="Server.delete(event, <?php echo e($id); ?>)" class="font-red" title="">
                    <i class="fa fa-trash-o text-dark"></i>
                    Удалить навсегда
                </a>
            </li>
        </ul>
    </div>

    <div class="media-heading name">
        <?php echo e($name); ?>

    </div>

    <div class="media-body">
            <div>Хост: <span class="text-gray"><?php echo e($host); ?></span></div>
            <div>Порт: <span class="text-gray"><?php echo e($port); ?></span></div>
            <div>Пароль: <span class="pointer text-gray" data-password="<?php echo e($password); ?>">•••••••••</span></div>
    </div>
</div>