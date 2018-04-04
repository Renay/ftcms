<tr id="c<?php echo e($id); ?>">
    <td><?php echo e($id); ?></td>
    <td class="name"><?php echo e($name); ?></td>
    <td><?php echo e($priority); ?></td>
    <td><?php echo e($server); ?></td>
    <td>
        <div class="dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="true">
                <p><i class="fa fa-ellipsis-v"></i></p>
            </a>
            <ul class="dropdown-menu action">
                <li>
                    <a href="#" class="font-red" onclick="Category.edit(event, <?php echo e($id); ?>);" title="">
                        <i class="fa fa-pencil mail-icon"></i>
                        Редактировать
                    </a>
                </li>
                <li>
                    <a href="#" class="font-red" onclick="Category.onDelete(event, <?php echo e($id); ?>)">
                        <i class="fa fa-trash mail-icon"></i>
                        Удалить
                    </a>
                </li>
            </ul>
        </div>
    </td>
</tr>
