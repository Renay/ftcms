<!--left-fixed -navigation-->
<div class="sidebar" role="navigation">
    <div class="navbar-collapse" id="navbar">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <ul class="nav" id="side-menu">
                <?php $__currentLoopData = $di->navigation->make(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if(User::find(Cookie::get('auth_user_id'))['role'] == 'admin'): ?>
                        <?php if(isset($page['pages']) and is_array($page['pages'])): ?>
                            <li>
                                <a href="<?php echo e($page['url']); ?>"><i class="<?php echo e($page['icon']); ?> nav_icon"></i><?php echo e($page['name']); ?>

                                    <span class="fa arrow"></span>
                                </a>

                                <ul class="nav nav-second-level collapse">
                                    <?php $__currentLoopData = $page['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($p['url']); ?>"><?php echo e($p['name']); ?><!---span class="nav-badge-btm">08</span--></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e($page['url']); ?>"><i class="<?php echo e($page['icon']); ?> nav_icon"></i><?php echo e($page['name']); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e($di->navigation->make()[4]['url']); ?>">
                                    <i class="<?php echo e($di->navigation->make()[4]['icon']); ?> nav_icon"></i>
                                    <?php echo e($di->navigation->make()[4]['name']); ?>

                                </a>
                            </li>
                            <?php break; ?>;
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
            <div class="clearfix" style="padding-bottom: 50px;"></div>
        </nav>
    </div>
    <!-- //sidebar-collapse -->
</div>
<!--left-fixed -navigation-->