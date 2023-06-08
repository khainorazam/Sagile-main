

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Task</h5>
            </div>
            <form method="post" action="<?php echo e(route('task.store')); ?>" autocomplete="off">
                <div class="card-body">
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group">
                            <label><?php echo e(_('Sprint Id')); ?></label>
                            <select class="form-control" name="sprint">
                                <?php $__currentLoopData = $sprints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sprint->id); ?>"><?php echo e($sprint->sprint_name); ?> || <?php echo e($sprint->sprint_desc); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('User Story Id')); ?></label>
                            <select class="form-control" name="userstory">
                                <?php $__currentLoopData = $userstories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userstory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($userstory->id); ?>"><?php echo e($userstory->user_story); ?> || <?php echo e($userstory->desc_story); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('Task Title')); ?></label>
                            <input type="text" name="title" class="form-control" placeholder="<?php echo e(_('Title')); ?>" >
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('Task Description')); ?></label>
                            <input type="text" name="description" class="form-control" placeholder="<?php echo e(_('Description')); ?>" >
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('Status')); ?></label>
                            <select class="form-control" name="status">
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status->id); ?>"><?php echo e($status->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('Task Start Date')); ?></label>
                            <input type="date" name="start" class="form-control" placeholder="<?php echo e(_('Start Date')); ?>" >
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('Task End Date')); ?></label>
                            <input type="date" name="end" class="form-control" placeholder="<?php echo e(_('End Date')); ?>" >
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary"><?php echo e(_('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SAgile\resources\views/task/create.blade.php ENDPATH**/ ?>