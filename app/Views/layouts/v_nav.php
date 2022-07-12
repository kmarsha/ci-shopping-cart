
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="<?= base_url() ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Online Shop</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= base_url() ?>" class="nav-link">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li> -->
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge" id="cart-count"><?php echo (isset($cart_count)) ? $cart_count : '' ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php 
              $no = 0;
              foreach ($carts as $cart) {
                $no++;
                if ($no > 3) {
                  $cart = [];
                }

                if ($cart != []) {
                  ?>
                    <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                        <?php 
                          foreach ($products as $product) {
                            if ($product->product_name == $cart['name']) {
                              ?>
                                <img src="<?= base_url() ?>/products/<?= $product->photo ?>" alt="<?= $product->photo ?>" height="75" width="75" style="object-fit: cover;" class=" mr-3 img-circle">
                              <?php
                            }
                          }
                        ?>
                        <div class="media-body">
                          <h3 class="dropdown-item-title">
                            <p class="text-truncate"><?= $cart['name'] ?></p>
                            <!-- <span class="float-right text-sm text-danger"><i class="fas fa-minus"></i></span> -->
                          </h3>
                          <!-- <p class="text-sm"></p> -->
                          <div class="row justify-content-between m-1">
                            <p class="text-sm text-muted"><i class="">Qty: </i> <?= $cart['qty'] ?></p>
                            <p class="text-sm text-muted"><i class="">Total: </i> <?= number_format($cart['subtotal'], 2, ',', '.') ?></p>
                          </div>
                        </div>
                      </div>
                      <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                  <?php
                }
              }
            ?>
            <a href="<?= route_to('carts') ?>" class="dropdown-item dropdown-footer">View Cart</a>
            <a href="#" class="dropdown-item dropdown-footer">Check Out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->