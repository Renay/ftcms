<?php $__env->startSection('title', 'Главная'); ?>

<?php $__env->startSection('content'); ?>
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">
            <div class="row-one">
                <div class="col-md-4 widget">
                    <div class="stats-left ">
                        <h5>Сегодня</h5>
                        <h4>Прибыль</h4>
                    </div>
                    <div class="stats-right">
                        <label><?php echo e((int)$income['sum']); ?></label>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-4 widget states-mdl">
                    <div class="stats-left">
                        <h5>Сегодня</h5>
                        <h4>Покупки</h4>
                    </div>
                    <div class="stats-right">
                        <label><?php echo e((int)$income['count']); ?></label>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-4 widget states-last">
                    <div class="stats-left">
                        <h5>Сегодня</h5>
                        <h4>Заказы</h4>
                    </div>
                    <div class="stats-right">
                        <label><?php echo e((int)$orders['count']); ?></label>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="row">
                <div class="col-md-4 stats-info widget">
                    <div class="stats-title">
                        <h4 class="title">Популярность товаров</h4>
                    </div>
                    <hr>
                    <div id="pieChart" style="height: 300px"></div>
                </div>
                <div class="col-md-8 stats-info stats-last-week widget-shadow">
                    <div class="stats-title">
                        <h4 class="title">Статистика покупок за неделю</h4>
                    </div>
                    <hr>
                    <div id="weekStatic" style="height: 300px;"></div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $('#weekStatic').highcharts({
            xAxis: {
                categories: <?php echo json_encode(array_keys($lineChart)); ?>,
            },
            yAxis: {
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }],
                min: 0
            },
            tooltip: {
                headerFormat: 'Дата: {point.key}.2017<br/>',
                pointFormat: 'Куплено товаров: {point.y}'
            },
            legend: {
                enabled: false
            },
            series: [{
                color: '#5BBD72',
                type: 'spline',
                data: <?php echo json_encode(array_values($lineChart), JSON_NUMERIC_CHECK); ?>

            }]
        });

        $("#pieChart").highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            tooltip: {
                headerFormat: 'Товар: {point.key}<br/>',
                pointFormat: '{series.name}: {point.percentage:.1f}%'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Доля среди всех покупок',
                data: <?php echo json_encode($pieChart, JSON_NUMERIC_CHECK); ?>

            }]
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>