

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Project</h5>
            </div>
            <form method="post" action="<?php echo e(route('project.update' , collect($project)->first())); ?>" autocomplete="off">
                <div class="card-body">
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group">
                            <label><?php echo e(_('Project Name')); ?></label>
                            <input type="text" name="name" class="form-control" placeholder="<?php echo e(_('Name')); ?>" value="<?php echo e($project->proj_name); ?>">
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('Project Description')); ?></label>
                            <input type="text" name="description" class="form-control" placeholder="<?php echo e(_('Description')); ?>" value="<?php echo e($project->proj_desc); ?>">
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('Start Date')); ?></label>
                            <input type="date" name="start_date" class="form-control" value="<?php echo e($project->start_date); ?>">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(_('End Date')); ?></label>
                            <input type="date" name="end_date" class="form-control" value="<?php echo e($project->end_date); ?>">
                        </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="user" value="<?php echo e(Auth()->user()->id); ?>">
                    <button type="submit" class="btn btn-fill btn-primary"><?php echo e(_('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SAgile\resources\views/project/edit.blade.php ENDPATH**/ ?>