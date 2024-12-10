<?php include_once ROOT_DIR . "views/clients/header.php" ?>

   <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
      </div>
            <div class="carousel-item">
                <img class="w-100" src="img/bg7.webp" alt="Image" />
                <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-start">
                    <div class="col-lg-7">
                        <!-- <a
                        href=""
                        class="btn btn-blu rounded-pill py-sm-3 px-sm-5"
                        >XEM THÊM</a
                        > -->
                    </div>
                    </div>
                </div>
                </div>
            </div>

        <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Mỹ phẩm cao cấp</h1>
                       
                    </div>
                </div>
           <div class="tab-content">
            
                <div id="tab-1" class="tab-pane fade show p-0 active">
                  
                    <div class="row g-4">
                      <?php foreach ($cosmetics as $cos) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                          
                            <div class="product-item">
                              
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="w-100" src="<?= $cos['image'] ?>" alt="" style="width: 100%; /* Đặt chiều rộng hình ảnh là 100% */height: 200px; /* Tự động điều chỉnh chiều cao */">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="<?= ROOT_URL . '?ctl=detail&id=' . $cos['id'] ?>"><?= $cos['name'] ?></a>
                                    <span class="text-primary me-1"><?= $cos['price'] ?> VNĐ</span>
                                </div>
                                <div class="center border-top">
                                
                                        <a class="text-body" href="<?= ROOT_URL . '?ctl=detail&id=' . $cos['id'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    
                                </div>
                            </div>
                        </div>                        
                        <?php endforeach ?>

                        
                    </div>
                </div>
            </div>
            </div>
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Mỹ phẩm cơ bản</h1>
                       
                    </div>
                </div>
           <div class="tab-content">
            
                <div id="tab-1" class="tab-pane fade show p-0 active">
                  
                    <div class="row g-4">
                      <?php foreach ($list_products as $pro) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                          
                            <div class="product-item">
                              
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="<?= $pro['image'] ?>" alt="" style="width: 100%; /* Đặt chiều rộng hình ảnh là 100% */height: 200px; /* Tự động điều chỉnh chiều cao */">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="<?= ROOT_URL . '?ctl=detail&id=' . $pro['id'] ?>"><?= $pro['name'] ?></a>
                                    <span class="text-primary me-1"><?= $pro['price'] ?> VNĐ</span>
                                </div>
                                
                                    <div class="center border-top">
                                
                                        <a class="text-body" href="<?= ROOT_URL . '?ctl=detail&id=' . $pro['id'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    
                                </div>
                        
                                
                            </div>
                        </div>
                        <?php endforeach ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                           <!-- <a class="btn btn-primary rounded-pill py-3 px-5" href=""></a>---->
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
