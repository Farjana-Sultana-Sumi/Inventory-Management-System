<?php $__env->startSection('content'); ?>

<section class="content-header">
  <h1>
    Dashboard
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo e($data['total_products']); ?></h3>

              <p>Total Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
            <a href="/stock/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo e($data['sales_transactions']); ?></h3>

              <p>Sales Transactions</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="/sales/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e($data['suppliers']); ?></h3>

              <p>Suppliers</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="/supplier/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo e($data['customers']); ?></h3>

              <p>Customers</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="/customer/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
          <div class="box-header with-bstock_category">
            <h3 class="box-title">Stock Availability</h3>

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
                               data-url="<?php echo e(url('/stock/get/availability')); ?>"
                               data-pagination="true"
                               data-side-pagination="server"
                               data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                               data-search="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-sort-name="stock_id"
                               data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="stock_id" data-align="center" data-sortable="true">Stock ID</th>
                                <th data-field="category.category_name" data-align="center" data-sortable="true">Stock Category</th>
                                <th data-field="stock_name" data-align="center" data-sortable="true">Stock Type</th>
                                <th data-field="purchase_cost" data-align="center" data-sortable="true">Purchase Cost (₹)</th>
                                <th data-field="selling_cost" data-align="center" data-sortable="true">Selling Cost (₹)</th>
                                <th data-field="stock_quantity" data-align="center" data-sortable="true">Available Quantity</th>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>