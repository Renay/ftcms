<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <optgroup label='<?php echo e($category ?: 'Без категории'); ?>'>
        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value='<?php echo e($p['id']); ?>'><?php echo e($p['name']); ?> - <?php echo e($p['price']); ?> рублей</option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </optgroup>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>