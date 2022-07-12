
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Product </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Online Shop</a></li>
              <!-- <li class="breadcrumb-item"><a href="">Product</a></li> -->
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2 class="text-center mb-4">Product</h2>
            <div class="row">
              <?php
                foreach ($products as $product) {
                  ?>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <img src="<?= base_url() ?>/products/<?= $product->photo ?>" class="card-img-top mb-4" width="250" height="250" style="object-fit: scale-down;" alt="<?= $product->photo ?>">
                          <h5 class="text-truncate"><?= $product->product_name ?></h5>

                          <p class="card-text text-truncate">
                            <?= $product->description ?>
                          </p>

                          <div class="mb-2">
                            <h5 class="">Rp <?= number_format($product->price, 2, ',', '.') ?></h5>
                          </div>

                          <div class="row justify-content-between mb-2">
                            <div class="col-4">
                              <input type="number" name="quantity" id="<?= $product->product_id ?>" value="1" class="quantity form-control">
                            </div>
                              <button class="add_cart btn btn-success" title="Add To Cart" data-product-id="<?= $product->product_id ?>" data-product-name="<?= $product->product_name ?>" data-product-price="<?= $product->price ?>">
                                <i class="fas fa-shopping-cart"></i>
                              </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                }
              ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body">
                <h4 class="text-center">Shopping Cart</h4>
                <table class="table table-striped table-responsive">
                  <thead>
                    <tr>
                      <th>Items</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="detail_cart"> 

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $(function(){
        $(document).on('click', '.add_cart', function () {  
          var product_id    = $(this).data("product-id");
          var product_name  = $(this).data("product-name");
          var product_price = $(this).data("product-price");
          var quantity      = $('#' + product_id).val();
          $.ajax({
              type : "POST",
              url : "<?= base_url() ?>/product/add_to_cart",
              data : {
                product_id: product_id, 
                product_name: product_name, 
                product_price: product_price, 
                quantity: quantity
              },
              success: function(data){
                  $('#detail_cart').html(data);
              }
          });
          $.ajax({
              url : "<?= base_url() ?>/product/get_count_cart",
              method : "GET",
              data : null,
              success :function(data){
                  $('#cart-count').text(data);
              }
          });
        })
      
        $('#detail_cart').load("<?= base_url() ?>/product/load_cart");

        $(document).on('click','.remove_cart',function(){
            var row_id = $(this).attr("id"); 
            $.ajax({
                url : "<?= base_url() ?>/product/delete_cart",
                type : "POST",
                data : {row_id : row_id},
                success : function(data){
                    $('#detail_cart').html(data);
                }
            });
            $.ajax({
                url : "<?= base_url() ?>/product/get_count_cart",
                type : "GET",
                data : null,
                success: function(data){
                    $('#cart-count').text(data);
                }
            });
        });
    });

  </script>