

<?php $__env->startSection('title', 'Платежи'); ?>

<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="row">
                <h3 class="title1">Платежи</h3>
                <div class="widget-shadow">
                    <div class="stats-info stats-last ">
                        <div class="col-md-6 col-sm-9 col-xs-9 p-l-0 m-b-15">
                            <input class="form-control1 search" onkeyup="Payment.search()" placeholder="Поиск по нику или № платежа..." type="search" >
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <button type="button" class="btn btn-primary btn-square" onclick="Payment.search()">Найти</button>
                        </div>
                        <table class="table stats-table ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>НИК ИГРОКА</th>
                                <th>ТОВАР</th>
                                <th>СЕРВЕР</th>
                                <th>СТАТУС</th>
                                <th>СУММА</th>
                                <th>№ ПЛАТЕЖА</th>
                                <th>ДАТА</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php echo $__env->make('admin.payments.payment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready( function() {
            var inProcess = false;
            var num = 20;

            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() >= $(document).height() && !inProcess) {

                    $.ajax({
                        url: '/admin/merchant/load',
                        method: 'POST',
                        data: 'load=' +num,
                        beforeSend: function() {
                            inProcess = true;
                        }
                    }).done( function(data) {
                        if (data.length > 0) {
                            $("tbody").append(data);

                            inProcess = false;
                            num += 10;
                        }
                    });

                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>