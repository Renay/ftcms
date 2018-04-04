<?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <th scope="row"><?php echo e($p['id']); ?></th>
        <td><?php echo e($p['username']); ?></td>
        <td><?php echo e($p['goods']); ?></td>
        <td><?php echo e($p['server'] ?: 'Все'); ?></td>
        <?php switch($p['status']):
            case (0): ?>
                <td><span class="label label-warning strong">Не оплачен</span></td>
            <?php break; ?>

            <?php case (1): ?>
                <td><span class="label label-success strong">Проведен</span></td>
            <?php break; ?>

            <?php case (2): ?>
            <td><span class="label label-warning strong">Ошибка</span></td>
            <?php break; ?>

            <?php case (3): ?>
            <td><span class="label label-error strong">Ошибка</span></td>
            <?php break; ?>
        <?php endswitch; ?>
        <td><?php echo e($p['sum']); ?> руб.</td>
        <td>№<?php echo e($p['pay_id'] ?: 0000001); ?></td>
        <td><?php echo e($p['created_at']); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td colspan="8" class="text-center">По данному запросу платежей не найдено. Или их вообще нет.</td>
    </tr>
<?php endif; ?>
