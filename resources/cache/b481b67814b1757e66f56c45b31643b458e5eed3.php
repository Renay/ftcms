<?php if(sizeof($servers)): ?>
    <div class="pull-right">
        <div class="dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="true">
                <p><i class="fa fa-ellipsis-v"></i></p>
            </a>
            <ul class="dropdown-menu action">
                <?php $__currentLoopData = $servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $server): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="#" class="changeServer font-red" data-name="<?php echo e($server['name']); ?>" data-id="<?php echo e($server['id']); ?>" title="">
                            <?php echo e($server['name']); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php else: ?>
    <div class="pull-right">
        <div class="dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="true">
                <p><i class="fa fa-ellipsis-v"></i></p>
            </a>
            <ul class="dropdown-menu action">
                <li>
                    <a href="#" class="font-red" title="">
                        Серверов нет
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php endif; ?>