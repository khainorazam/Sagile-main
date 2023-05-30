<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'White Dashboard')); ?></title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('white')); ?>/img/apple-icon.png">
        <link rel="icon" type="image/png" href="<?php echo e(asset('white')); ?>/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="<?php echo e(asset('white')); ?>/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="<?php echo e(asset('white')); ?>/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="<?php echo e(asset('white')); ?>/css/theme.css" rel="stylesheet" />
        
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .btn-pink {
                background-color: #e68888;
                color:#ffffff;
                border-color: #e68888;
                background-image: -webkit-linear-gradient(to bottom left, #e68888, #e68888, #e68888);
                background-image: -o-linear-gradient(to bottom left, #e68888, #e68888, #e68888);
                background-image: -moz-linear-gradient(to bottom left, #e68888, #e68888, #e68888);
                background-image: linear-gradient(to bottom left, #e68888, #e68888, #e68888);
            }
            .btn-pink:hover, .btn-pink:focus, .btn-pink:active, .btn-pink.active, .open .dropdown-toggle.btn-pink {
                background-color: #e68888;
                color:#ffffff;
                border-color: #e68888;
                background-image: -webkit-linear-gradient(to bottom left, #e68888, #e68888, #e68888);
                background-image: -o-linear-gradient(to bottom left, #e68888, #e68888, #e68888);
                background-image: -moz-linear-gradient(to bottom left, #e68888, #e68888, #e68888);
                background-image: linear-gradient(to bottom left, #e68888, #e68888, #e68888);
            }

            /* The switch - the box around the slider */
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            /* Hide default HTML checkbox */
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            /* The slider */
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #030c14;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #030c14;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }

            .navbar-nav li > a {
                text-transform: capitalize;
                color: #11dc4b;
                transition: background-color .2s, color .2s;
                
                &:hover,
                &:focus {
                    background-color: #11dc4b;
                    color: #fff;
                    border-radius: 20px;
                }
            }

            .navbar-nav li.active > a {
                background-color: #11dc4b;
                color: #fff;
                border-radius: 20px;
            }
        </style>
    </head>
    <body class="white-content <?php echo e($class ?? ''); ?>">
        <?php if(auth()->guard()->check()): ?>
            <div class="wrapper">
                    <?php echo $__env->make('layouts.navbars.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="main-panel">
                    <?php echo $__env->make('layouts.navbars.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="content">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>

                </div>
            </div>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        <?php else: ?>
            <div class="wrapper wrapper-full-page">
                <div class="full-page <?php echo e($contentClass ?? ''); ?>">
                    <div class="content">
                        <div class="container">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary active" data-color="primary"></span>
                        <span class="badge filter badge-info" data-color="blue"></span>
                        <span class="badge filter badge-success" data-color="green"></span>
                    </div>
                    <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line text-center color-change">
                    <span class="color-label">LIGHT MODE</span>
                    <span class="badge light-badge mr-2"></span>
                    <span class="badge dark-badge ml-2"></span>
                    <span class="color-label">DARK MODE</span>
                  </li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/white-dashboard-laravel" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
                    <a href="https://white-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html" target="_blank" class="btn btn-default btn-block btn-round">
                    Documentation
                    </a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
                    <br>
                    <br>
                    <a class="github-button" href="https://github.com/creativetimofficial/white-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                </ul>
            </div>
        </div>
        <script src="<?php echo e(asset('white')); ?>/js/core/jquery.min.js"></script>
        <script src="<?php echo e(asset('white')); ?>/js/core/popper.min.js"></script>
        <script src="<?php echo e(asset('white')); ?>/js/core/bootstrap.min.js"></script>
        <script src="<?php echo e(asset('white')); ?>/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        
        <!-- Chart JS -->
        
        <!--  Notifications Plugin    -->
        <script src="<?php echo e(asset('white')); ?>/js/plugins/bootstrap-notify.js"></script>

        <script src="<?php echo e(asset('white')); ?>/js/white-dashboard.min.js?v=1.0.0"></script>
        <script src="<?php echo e(asset('white')); ?>/js/theme.js"></script>

        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <?php echo $__env->yieldPushContent('js'); ?>

        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .background-color span').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data', new_color);
                        }

                        if ($main_panel.length != 0) {
                            $main_panel.attr('data', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data', new_color);
                        }
                    });

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                            var $btn = $(this);

                            if (white_color == true) {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').removeClass('white-content');
                                }, 900);
                                white_color = false;
                            } else {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').addClass('white-content');
                                }, 900);

                                white_color = true;
                            }
                    });

                    $('.light-badge').click(function() {
                        $('body').addClass('white-content');
                    });

                    $('.dark-badge').click(function() {
                        $('body').removeClass('white-content');
                    });

                    var url = window.location.href;
                    // passes on every "a" tag
                    $(".navbar-nav .nav-link").each(function () {
                        // checks if its the same on the address bar
                        if (url == (this.href)) {
                        $(this).closest("li").addClass("active");
                        //for making parent of submenu active
                        $(this).closest("li").parent().parent().addClass("active");
                        }
                    });
                });
            });

            var checked = localStorage.getItem('checkboxcolor');
            if (checked == "true") {
                document.getElementById("toggle-color").setAttribute('checked','checked');
                $('body').removeClass('white-content');
            }

            function changeBackground()
            {
                var checkbox = document.getElementById('toggle-color');
                if (checkbox.checked != true)
                {
                    localStorage.clear()
                    $('body').addClass('white-content');
                }else{
                    localStorage.setItem('checkboxcolor', true);
                    $('body').removeClass('white-content');
                }
            }
        </script>
        <?php echo $__env->yieldPushContent('js'); ?>
    </body>
</html>
<?php /**PATH C:\laragon\www\SAgile\resources\views/layouts/app.blade.php ENDPATH**/ ?>