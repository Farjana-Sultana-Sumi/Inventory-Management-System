<?php $__env->startSection('content'); ?>

<style type="text/css">
  th,td {
      text-align: center;
  }
</style>

<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Sales Report</li>
  </ol>
</section>

<!-- Main content -->
    <section class="content">

    <?php if(Session::has('message')): ?>
    <div class="row">'
    <div class="col-xs-12">
      <div class="alert <?php if(Session::get('messageType') == 1): ?> alert-success <?php else: ?> alert-danger <?php endif; ?>">
        <?php echo e(Session::get('message')); ?>

      </div>
    </div>
    </div>
    <?php endif; ?>

    <form class="form-horizontal generate_report_inline" role="form" method="GET" action="<?php echo e(url('/report/view_report')); ?>">
      <div class="row">
      <div class="col-md-offset-3 col-md-2">
        <div class="form-group">
          <label>Report Type</label>
            <select class="form-control inline_report_type" name="report_type">
              <option selected="" disabled="" value="">- Select -</option>
              <option value="1" <?php if($data['report_type'] == 1): ?> selected="" <?php endif; ?>>Purchase</option>
              <option value="2" <?php if($data['report_type'] == 2): ?> selected="" <?php endif; ?>>Sales</option>
              
            </select>
        </div>      
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label>From</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right inline_datepicker_from from" name="from" value="<?php echo e(\Carbon\Carbon::parse($data['from'])->format('m/d/Y')); ?>" autocomplete="off">
          </div>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label>To</label><br>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right inline_datepicker_to to" name="to" value="<?php echo e(\Carbon\Carbon::parse($data['to'])->format('m/d/Y')); ?>" autocomplete="off">
          </div>
        </div>
      </div>
      </div>
    </form>

    <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-shopping-bag"></i> Sales Report
          <small class="pull-right">Dated: <?php echo e(\Carbon\Carbon::now()->format('jS M Y - h:i:s A')); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Transaction ID</th>
            <th>Date</th>
            <th>Sales ID</th>
            <th>Customer</th>
            <th>Grand total</th>
            <th>Paid</th>
            <th>Balance</th>
           
          </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($value->id); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($value->created_at)->format('jS M Y')); ?></td>
                <td><?php echo e($value->sales_id); ?></td>
                <td><?php echo e($value->customer->customer_name); ?></td>
                <td> <i class="fa fa-inr"></i> <?php echo e($value->subtotal); ?></td>
                <td> <i class="fa fa-inr"></i> <?php echo e($value->payment); ?></td>
                <td> <i class="fa fa-inr"></i> <?php echo e($value->balance); ?></td>
                <td> <i class="fa fa-inr"></i> <?php echo e($value->due); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
        <img src="/img/credit/visa.png" alt="Visa">
        <img src="/img/credit/mastercard.png" alt="Mastercard">
        <img src="/img/credit/american-express.png" alt="American Express">
        <img src="/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Payments from foreign countries must be payable and immediately negotiable in the United States for the full amount of the fee required.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Report Date :  <?php echo e($data['from']->format('jS M Y')); ?> - <?php echo e($data['to']->format('jS M Y')); ?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total Purchase:</th>
              <td> <i class="fa fa-inr"></i> <?php echo e($total['purchase']); ?></td>
            </tr>
            <tr>
              <th>Paid Amount:</th>
              <td> <i class="fa fa-inr"></i> <?php echo e($total['payment']); ?></td>
            </tr>
            <tr>
              <th>Balance Amount:</th>
              <td> <i class="fa fa-inr"></i> <?php echo e($total['balance']); ?></td>
            </tr>
            <tr>
              <th>Due Amount:</th>
              <td> <i class="fa fa-inr"></i> <?php echo e($total['due']); ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

     <div class="row">
       <div class="col-xs-12">
         <a href="<?php echo e('/report/pdf_report'.str_replace(Request::url(), '', Request::fullUrl())); ?>" class="btn btn-primary pull-right" target="_blank"> <i class="fa fa-file-pdf-o"></i> Generate PDF</a>
       </div>
     </div> 
  </section>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>