

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Sprint</h5>
            </div>
            <form method="post" action="<?php echo e(route('sprint.store')); ?>" autocomplete="off">
                <div class="card-body">
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group">
                            <label><?php echo e(_('Sprint Name')); ?></label>
                            <input type="text" name="name" class="form-control" placeholder="<?php echo e(_('Name')); ?>" >
                        </div>
                        <div class="form-group">
                            <label><?php echo e(_('Sprint Description')); ?></label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(_('Assign To')); ?></label>
                            <select multiple class="form-control username" name="user[]">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(_('Start Date')); ?></label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(_('End Date')); ?></label>
                            <input type="date" name="end_date" class="form-control">
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

<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function() {
        $('.username').select2();
    });
</script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SAgile\resources\views/sprint/create.blade.php ENDPATH**/ ?>