<?php $__env->startSection('content'); ?>

<script type="text/javascript" src="/js/moment.min.js"></script>

<script type="text/javascript">

  function createdFormatter(value, row, index) {

      return [ moment(row['created_at']).format('Do MMM YYYY, h:mm A') ];
      
  }

  function modeFormatter(value, row, index) {

    if(row['mode'] == 1){
      return ['Cash'];
    }else if(row['mode'] == 2){
      return ['Cheque'];
    }else if(row['mode'] == 3){
      return ['Card'];
    }  

  }

</script>

<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add Sales</li>
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

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
          <div class="box-header with-bsales">
            <h3 class="box-title">View Outstandings</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">

            <div class="row" style="width:99%;margin-left:5px">
                      <div class="col-xs-12">
                        <table id="table" class="table table-responsive" 
                               data-toggle="table"
                               data-url="<?php echo e(url('/transaction/get_outstandings')); ?>"
                               data-pagination="true"
                               data-side-pagination="server"
                               data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                               
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-sort-name="id"
                               data-sort-order="desc">
                            <thead>
                            <tr>
                                
                                <th data-field="id" data-align="center" data-sortable="true">Transaction ID</th>
                              
                                <th data-field="sales_id" data-align="center" data-sortable="true">Sales Id</th>

                                <th data-field="created_at" data-formatter="createdFormatter" data-align="center" data-sortable="true">Date</th>

                                <th data-field="customer.customer_name" data-align="center" data-sortable="true">Customer</th>

                                <th data-field="subtotal" data-align="center" data-sortable="true">Purchase Amount</th>

                                <th data-field="payment" data-align="center" data-sortable="true">Payment</th>

                                <th data-field="balance" data-align="center" data-sortable="true">Balance</th>

                                <th data-field="due" data-align="center" data-sortable="true">Due</th>
                                
                            </tr>
                            </thead>
                        </table>
                      </div>
            </div>

          </div> 
          </div>
          <!-- /.box-body -->
          </div>
        </div>  
      </div>  
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>