<?php $__env->startSection('content'); ?>

<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Customer</li>
  </ol>
</section>

<!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Customer</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form class="form-horizontal create_customer" role="form" method="POST" action="<?php echo e(url('/customer/update/'.$customer->id)); ?>">
      
                    <?php echo e(csrf_field()); ?>


                    <div class="box-body">

                      <div class="row">
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Customer Name</label><br>
                            <input type="text" class="form-control" name="customer_name" placeholder="Full name" value="<?php echo e($customer->customer_name); ?>">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="customer_email" placeholder="abc@xyz.com" value="<?php echo e($customer->customer_email); ?>">
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Address</label><br>
                            <textarea class="form-control" placeholder="Enter current address ... " name="customer_address"><?php echo e($customer->customer_address); ?></textarea>
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Contact Mobile</label><br>
                            <input type="text" name="customer_contact1" class ='form-control' placeholder = '' required="required" maxlength="11" minlength="10"  value="<?php echo e($customer->customer_contact1); ?>"/>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Alternate Mobile</label><br>
                            <input type="text" name="customer_contact2" class ='form-control' placeholder = '' maxlength="11" minlength="10"  value="<?php echo e($customer->customer_contact2); ?>"/>
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        
                        <!--<div class="col-sm-4 col-offset-sm-8">
                          <div class="form-group">
                            <label>Balance</label><br>
                            <input type="text" name="" readonly="" class ='form-control' placeholder = '' value="<?php echo e($customer->balance); ?>"/>
                          </div>
                        </div> -->

                      </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Reset</button>
                      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Update</button>
                    </div>
            </form>
          </div>
          <!-- /.box-body -->
          </div>
        </div>  
      </div>  
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>