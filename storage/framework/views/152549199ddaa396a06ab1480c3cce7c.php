

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Security Features</h5>
            </div>
            <div class="card-body">
                <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead>
                            <tr>
                                <th>Security Features Id</th>
                                <th>Security Features Name</th>
                                <th>Security Features Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $secfeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secfeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($secfeature->id); ?></td>
                            <td><?php echo e($secfeature->secfeature_name); ?></td>
                            <td><?php echo e($secfeature->secfeature_desc); ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?php echo e(route('secfeature.edit', collect($secfeature)->first() )); ?>">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-fill" href="#" data-toggle="modal" data-target="#delete_confirm" data-id="<?php echo e(route('secfeature.destroy', collect($secfeature)->first() )); ?>">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo e(route('secfeature.create')); ?>" class="btn btn-info">Add New Security Features</a>
            </div>
        </div>
    </div>
  </div>

<div class="modal fade" id="delete_confirm" tabindex="-1" secfeature="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this Item? This operation is irreversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a  type="button" class="btn btn-danger Remove_square">Delete</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#delete_confirm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var $recipient = button.data('id');
            var modal = $(this);
            modal.find('.modal-footer a').prop("href",$recipient);
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SAgile\resources\views/secfeature/index.blade.php ENDPATH**/ ?>