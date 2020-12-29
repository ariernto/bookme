
<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar no-border-bottom">
        <?php echo e(__("Dashboard")); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="bravo-user-chart border rounded-lg shadow">
                <div class="chart-title">
                    <?php echo e(__("Earning statistics")); ?>

                    <div class="action-control">
                        <div id="reportrange">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <canvas class="bravo-user-render-chart"></canvas>
                <script>
                    var earning_chart_data = <?php echo json_encode($earning_chart_data); ?>;
                </script>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bravo-user-dashboard">
                
                <div class="dashboard-price-info">
                    <?php if(!empty($cards_report)): ?>
                        <?php $__currentLoopData = $cards_report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <div class="dashboard-item mb-4 border rounded-lg shadow">
                                    <div class="wrap-box">
                                        <div class="title">
                                            <?php echo e($item['title']); ?>

                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <?php echo e($item['amount']); ?>

                                            </div>
                                        </div>
                                        <div class="desc"> <?php echo e($item['desc']); ?></div>
                                    </div>
                                </div>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset("libs/chart_js/Chart.min.js")); ?>"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $(".bravo-user-render-chart").each(function () {
                let ctx = $(this)[0].getContext('2d');
                window.myMixedChartForVendor = new Chart(ctx, {
                    type: 'bar',//line - bar
                    data: earning_chart_data,
                    options: {
                        min:0,
                        responsive: true,
                        legend: {
                            display: true
                        },
                        scales: {
                            xAxes: [{
                                stacked: true,
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '<?php echo e(__("Timeline")); ?>'
                                }
                            }],
                            yAxes: [{
                                stacked: true,
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '<?php echo e(__("Currency: :currency_main",['currency_main'=>setting_item('currency_main')])); ?>'
                                },
                                ticks: {
                                    beginAtZero: true,
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += tooltipItem.yLabel + " (<?php echo e(setting_item('currency_main')); ?>)";
                                    return label;
                                }
                            }
                        }
                    }
                });
            });
            $(".bravo-user-chart form select").change(function () {
                $(this).closest("form").submit();
            });

            var start = moment().startOf('week');
            var end = moment();
            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                "alwaysShowCalendars": true,
                "opens": "left",
                "showDropdowns": true,
                ranges: {
                    '<?php echo e(__("Today")); ?>': [moment(), moment()],
                    '<?php echo e(__("Yesterday")); ?>': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '<?php echo e(__("Last 7 Days")); ?>': [moment().subtract(6, 'days'), moment()],
                    '<?php echo e(__("Last 30 Days")); ?>': [moment().subtract(29, 'days'), moment()],
                    '<?php echo e(__("This Month")); ?>': [moment().startOf('month'), moment().endOf('month')],
                    '<?php echo e(__("Last Month")); ?>': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    '<?php echo e(__("This Year")); ?>': [moment().startOf('year'), moment().endOf('year')],
                    '<?php echo e(__('This Week')); ?>': [moment().startOf('week'), end]
                }
            }, cb).on('apply.daterangepicker', function (ev, picker) {
                $.ajax({
                    url: '<?php echo e(url('user/reloadChart')); ?>',
                    data: {
                        chart: 'earning',
                        from: picker.startDate.format('YYYY-MM-DD'),
                        to: picker.endDate.format('YYYY-MM-DD'),
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function (res) {
                        if (res.status) {
                            window.myMixedChartForVendor.data = res.data;
                            window.myMixedChartForVendor.update();
                        }
                    }
                })
            });
            cb(start, end);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/User/Views/frontend/dashboard.blade.php ENDPATH**/ ?>