<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="text-center pt-5">
            <h1 class="font-weight-bold">Login to Your Account</h1>
        </div>
        <div class="row">
            <div class="col-md-6 text-right">
                <a href="<?php echo e(url('auth/facebook')); ?>"><img src="<?php echo e(asset('facebook.png')); ?>" style="height:60px;width:60px" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="<?php echo e(url('auth/twitter')); ?>"><img src="<?php echo e(asset('twitter.png')); ?>" style="height:60px;width:60px" alt=""></a>
            </div>
        </div>
        <br>
        <form class="form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="input-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-email-85"></i>
                    </div>
                </div>
                <input type="email" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(_('Email')); ?>">
                <?php echo $__env->make('alerts.feedback', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="input-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-lock-circle"></i>
                    </div>
                </div>
                <input type="password" placeholder="<?php echo e(_('Password')); ?>" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>">
                <?php echo $__env->make('alerts.feedback', ['field' => 'password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="text-center">
                <a href="#"><p class="font-weight-bold">FORGET PASSWORD?</p></a>
            </div>
            <div class="text-center mt-5" >
                <button class="btn btn-pink">Sign IN</button>
            </div>
        </form>
        
    </div>
    <div class="col-md-6">
        <div class="bg-image" 
        style="background-image: url(<?php echo e(asset('image1.png')); ?>);
               height: 70vh">
            <div class="text-center p-5">
                </br>
                </br>
                </br>
</br>
                <h1 class="font-weight-bold">Welcome Back ! </h1>
                <h2 class="font-weight-bold">Make your</h2>
                <h2 class="font-weight-bold">project <span style="color:green">faster</span> </h2>
            </div>
            <div class="text-center mt-5" >
                <div class="row align-items-end">
                    <div class="col">
                        <a class="btn btn-pink" href="<?php echo e(route('register')); ?>">Sign UP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['class' => 'login-page', 'page' => _('Login Page'), 'contentClass' => 'login-page'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SAgile\resources\views/auth/login.blade.php ENDPATH**/ ?>