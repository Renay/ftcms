

<?php $__env->startSection('title', 'Консоль'); ?>

<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="row">
                <h3 class="col-xs-12 col-sm-offset-1 col-sm-10 title1">Консоль</h3>

                <div class="col-sm-offset-1 col-sm-10 col-xs-12" >
                    <div id="consoleRow">
                        <div class="panel panel-primary" id="consoleContent">
                            <div class="panel-heading">
                                <?php echo $__env->make('admin.console.select', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <h3 class="panel-title">Напишите команду в строку и нажмите «ENTER»</h3>
                            </div>
                            <div class="panel-body" style="height: 250px;">
                                <ul class="list-group" id="groupConsole"></ul>
                            </div>
                            <div class="panel-footer">
                                <div class="input-group" id="consoleCommand">
                                    <span class="input-group-addon hidden-xs">
                                      <input id="chkAutoScroll" type="checkbox" checked="true" autocomplete="off"  title=""/>
                                        <span class="fa fa-arrow-down"></span>
                                    </span>
                                    <div id="txtCommandResults"></div>
                                    <div class="form-group">
                                        <?php $arr = array_shift($servers) ?>
                                        <input type="text" id="server" value="<?php echo e($arr['id']); ?>"
                                               data-name="<?php echo e($arr['name']); ?>" title="" hidden />
                                        <input type="text" class="form-control" id="txtCommand"  title="" />
                                    </div>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary" id="btnSend">
                                            <span class="fa fa-send"></span>
                                            <span class="hidden-xs"> Send</span>
                                        </button>
                                        <button type="button" class="btn btn-warning hidden-xs" id="btnClearLog">
                                            <span class="fa fa-eraser"></span>
                                            <span class="hidden-xs"> Clear</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('admin/js/console.js?v=1.1.1.1.1.1')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>