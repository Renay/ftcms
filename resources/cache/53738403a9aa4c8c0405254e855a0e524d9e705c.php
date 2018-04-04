<?php $__env->startSection('title', 'Network page'); ?>

<?php $__env->startSection('content'); ?>
    <section id="services">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $server => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-12 wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1 class="title text-left m-l-15 p-t-30">Сервер <?php echo e($server); ?></h1>
                        <p class="m-l-15">Чтобы приобрести привилегию, вам нужно вернутся <a href="//<?php echo e($_SERVER['SERVER_NAME']); ?>">назад</a></p>
                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($g['description']): ?>
                            <div class="col-md-4 padding wow fadeIn p-b-5 p-t-30" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <div class="panel panel-default m-r-10 m-l-10">
                                    <div class="panel-heading"><h2><?php echo e($g['name']); ?>  | <?php echo e($g['price']); ?> руб.</h2></div>
                                    <div class="panel-body">
                                        <div><?php echo $g['description'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!--/#services-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>