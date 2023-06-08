

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Edit Feedback</h5>
            </div>
            <form method="post" action="<?php echo e(route('feedback.update' , collect($feedback)->first())); ?>" autocomplete="off">
                <div class="card-body">
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="card">
                        <div class="card-body">
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Comments" value="Comments" <?php if($feedback->feedback_type == "Comments"): ?>checked <?php endif; ?> > Comments
        <span class="form-check-sign"></span>
      </label>
    </div>
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Suggestions" value="Suggestions" <?php if($feedback->feedback_type == "Suggestions"): ?>checked <?php endif; ?>> Suggestions
        <span class="form-check-sign"></span>
      </label>
    </div>
    <div class="form-check form-check-radio form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="feedback_type" id="Questions" value="Questions" <?php if($feedback->feedback_type == "Questions"): ?>checked <?php endif; ?>> Questions
        <span class="form-check-sign"></span>
      </label>
    </div>
  </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Describe Your Feedback</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?php echo e($feedback->description); ?></textarea>
                         </div>

                        <div class="form-group">
                            <label><?php echo e(_('Name')); ?></label>
                            <input type="text" name="name" class="form-control" placeholder="<?php echo e(_('Name')); ?>" value="<?php echo e($feedback->name); ?>" >
                        </div>

                        <div class="form-group">
                            <label><?php echo e(_('Email')); ?></label>
                            <input type="text" name="email" class="form-control" placeholder="<?php echo e(_('Email')); ?>" value="<?php echo e($feedback->email); ?>">
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

<?php echo $__env->make('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SAgile\resources\views/feedback/edit.blade.php ENDPATH**/ ?>