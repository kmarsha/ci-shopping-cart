
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Shopping Cart </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Online Shop</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Product</a></li>
              <li class="breadcrumb-item active">Cart</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <h1 class="text-center mb-5">Shopping Cart</h1>
        <div class="row">
              <?php
                foreach ($carts as $cart) {
                  ?>
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-body">
                          <?php 
                          foreach ($products as $product) {
                            if ($product->product_name == $cart['name']) {
                          ?>
                              <img src="<?= base_url() ?>/products/<?= $product->photo ?>" class="card-img-top mb-4" width="250" height="250" style="object-fit: scale-down;" alt="<?= $product->photo ?>">
                          <?php
                            }
                          }
                          ?>
                          <h5 class="text-truncate"><?= $cart['name'] ?></h5>

                          <h6 class="">Total: Rp <?= number_format($cart['subtotal'], 2, ',', '.') ?></h6>
                          <div class="row justify-content-between m-1">
                            <a href="#">
                              <button class="btn btn-success text-sm">
                                Check Out
                              </button>
                            </a>
                            <div class="col-4">
                              <input type="number" class="form-control" name="qty" id="<?= $cart['id'] ?>-qty" value="<?= $cart['qty'] ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                }
              ?>
        </div>
        <!-- </div> -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->