<?php include_once ROOT_DIR . "views/clients/header.php" ?>
        <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3"><?= $title ?></h1>
                       
                    </div>
                </div>
           <div class="tab-content">
            
                <div id="tab-1" class="tab-pane fade show p-0 active">
                  
                    <div class="row g-4">
                      <?php foreach ($products as $product) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                          
                            <div class="product-item">
                              
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="<?= $product['image'] ?>" alt="" style="width: 100%; /* Đặt chiều rộng hình ảnh là 100% */height: 200px; /* Tự động điều chỉnh chiều cao */">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="<?= ROOT_URL . '?ctl=detail&id=' . $product['id'] ?>"><?= $product['name'] ?></a>
                                    <span class="text-primary me-1"><?= $product['price'] ?> VNĐ</span>
                                </div>
                                <div class="center border-top " >
                                    
                                        <a class="text-body" href="<?= ROOT_URL . '?ctl=detail&id=' . $product['id'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                   
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
<?php include_once ROOT_DIR . 'views/clients/footer.php' ?>