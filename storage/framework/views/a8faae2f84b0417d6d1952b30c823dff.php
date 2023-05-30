<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal"><?php echo e(_('Project Management Tools')); ?></a>
            <div class="text-center">
                <label class="switch">
                    <input type="checkbox" id="toggle-color" onclick="changeBackground()">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <?php
            $projects = \App\Models\Project::get();
        ?>
        <ul class="nav">
            <li <?php if($pageSlug == 'dashboard'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p><?php echo e(_('Dashboard')); ?></p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-notes" ></i>
                    <span class="nav-link-text" ><?php echo e(__('Project List')); ?></span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li <?php if($pageSlug == 'dashboard'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('project.select', $project->id)); ?>">
                                <i class="tim-icons icon-app"></i>
                                <p><?php echo e($project->proj_name); ?></p>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </li>
            <li <?php if($pageSlug == 'dashboard'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('feedback.index')); ?>">
                    <i class="tim-icons icon-pencil"></i>
                    <p><?php echo e(_('Feedback')); ?></p>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH C:\laragon\www\SAgile\resources\views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>