<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total Project</h5>
                    <h3 class="card-title"><i class="tim-icons icon-notes text-primary"></i> <?php echo e($total_project); ?></h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total User</h5>
                    <h3 class="card-title"><i class="tim-icons icon-single-02 text-info"></i> <?php echo e($total_user); ?></h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total Feedback</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> <?php echo e($total_feedback); ?></h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total Task</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> <?php echo e($total_task); ?></h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    Chart
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('white')); ?>/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
            var project = [];
            var taskcomplete = [];
            
            setTimeout(() => {

                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                project.push("<?php echo $project->proj_name ?>");
                taskcomplete.push("<?php echo $project->task_total ?>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                initDashboardPageCharts();

                function initDashboardPageCharts(){
                    var chart_labels = project;
                    var chart_data = [10,5,2,3,4];
                    
                    var ctx = document.getElementById("chartBig1").getContext('2d');

                    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

                    gradientChartOptionsConfigurationWithTooltipGreen = {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },

                    tooltips: {
                        backgroundColor: '#f5f5f5',
                        titleFontColor: '#333',
                        bodyFontColor: '#666',
                        bodySpacing: 4,
                        xPadding: 12,
                        mode: "nearest",
                        intersect: 0,
                        position: "nearest"
                    },
                    responsive: true,
                    scales: {
                        yAxes: [{
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: 'rgba(29,140,248,0.0)',
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            suggestedMin: 50,
                            suggestedMax: 125,
                            padding: 20,
                            fontColor: "#9e9e9e"
                        }
                        }],

                        xAxes: [{
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: 'rgba(0,242,195,0.1)',
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9e9e9e"
                        }
                        }]
                    }
                    };
                    gradientStroke.addColorStop(1, 'rgba(66,134,121,0.15)');
                    gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0.0)'); //green colors
                    gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors
                    var config = {
                    type: 'line',
                    data: {
                        labels: chart_labels,
                        datasets: [{
                        label: "Total Task Complete",
                        fill: true,
                        backgroundColor: gradientStroke,
                        borderColor: '#00d6b4',
                        borderWidth: 2,
                        borderDash: [],
                        borderDashOffset: 0.0,
                        pointBackgroundColor: '#00d6b4',
                        pointBorderColor: 'rgba(255,255,255,0)',
                        pointHoverBackgroundColor: '#00d6b4',
                        pointBorderWidth: 20,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 15,
                        pointRadius: 4,
                        data: chart_data,
                        }]
                    },
                    options: gradientChartOptionsConfigurationWithTooltipGreen
                    };
                    var myChartData = new Chart(ctx, config);
                }
            }, 100);

          
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', ['pageSlug' => 'dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SAgile\resources\views/dashboard.blade.php ENDPATH**/ ?>