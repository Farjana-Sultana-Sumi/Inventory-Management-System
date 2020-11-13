<?php $__env->startSection('content'); ?>

<style type="text/css">
    .form-horizontal .form-group {
         margin: 0px !important; 
    }
</style>

<div class="login-box">
  <div class="login-logo">
    <a href="/">Drugs Inventory</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
      
      <?php echo e(csrf_field()); ?>


      <div class="form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
            <span class="fa fa-envelope form-control-feedback"></span>
            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
      </div>
      
      <div class="form-group has-feedback <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <input id="password" type="password" class="form-control" name="password" required>
            <span class="fa fa-lock form-control-feedback"></span>
            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
      </div>

      <div class="row">
            <div class="col-xs-8">
              <div class="checkbox">
                    <label>
                        
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
      </div>

    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>