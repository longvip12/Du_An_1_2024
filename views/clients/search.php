<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">
   
        <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3"></h1>
                        <h1>Từ khóa tìm kiếm :<?= $keyword ?></h1>
                    </div>
                </div>
           <div class="tab-content">
            
                <div id="tab-1" class="tab-pane fade show p-0 active">
                  
                    <div class="row g-4">
                        <?php if($products) : ?>
                      <?php foreach ($products as $product) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                          
                            <div class="product-item">
                              
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="<?= $product['image'] ?>" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?= $product['name'] ?></a>
                                    <span class="text-primary me-1"><?= $product['price'] ?> VNĐ</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="<?= ROOT_URL . '?ctl=detail&id=' . $pro['id'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="<?= ROOT_URL . '?ctl=add-cart&id=' . $product['id'] ?>"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>                        
                        <?php endforeach ?>

                        
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        <?php else :?>
            <div>
                Rất tiếc không tìm thấy sản phẩmẩ
            </div>
        <?php endif ?>
    </div>
            </div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>