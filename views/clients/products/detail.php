<?php include_once ROOT_DIR . "views/clients/header.php" ?>
            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="/php/twig/frontend/giohang/themvaogiohang">
                        <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane" id="pic-1">
                                        <!-- <img src="img/t3sp9.webp"> -->
                                    </div>
                                    <div class="tab-pane" id="pic-2">
                                        <!-- <img src="img/t3sp9.webp"> -->
                                    </div>
                                    <div class="tab-pane active" id="pic-3">
                                        <!-- <img src="img/t3sp9.webp"> -->
                                    </div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active">
                                        <a data-target="#pic-1" data-toggle="tab" class="">
                                            <!-- <img src="img/t3sp9.webp"> -->
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-target="#pic-2" data-toggle="tab" class="">
                                            <!-- <img src="img/t3sp9.webp"> -->
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-target="#pic-3 " data-toggle="tab" class="active">
                                            <img src="<?= $product['image'] ?>" alt="" style="width: 100%; /* Đặt chiều rộng hình ảnh là 100% */height: 500px; /* Tự động điều chỉnh chiều cao */ margin-left: 100px" >
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title"> <?= $product['name'] ?> </h3>
                                <p>Trạng thái:
                                    <?php if ($product['status'] > 0) : ?>
                                        <span class="badge bg-success">Còn hàng</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">Hết hàng</span>
                                    <?php endif ?>
                                </p>
                                <h4 class="price">Giá: <span><?=$product['price'] ?></span></h4>
                                
                                <p class="mt-4">
                                     
                                    <strong>Mô tả sản phẩm:</strong><br>
                                    <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, <strong>đảm bảo</strong> <br>
                                    <?= $product['description'] ?>
                                </p>
                                <div class="form-group">
                                    <?php if ($product['status'] > 0) : ?>
                                        <label for="soluong">Số lượng còn: <?= $product['quantity'] ?></label>
                                    <?php else : ?>
                                        
                                    <?php endif ?>
                                    
                                </div>
                               
                                <div class="action">
                                    <?php if ($product['status'] > 0) : ?>
                                        <a class="add-to-cart btn btn-outline-red border-2 py-2 px-4 mt-2" id="btnThemVaoGioHang" href="<?= ROOT_URL . '?ctl=add-cart&id=' . $product['id'] ?>">Thêm vào giỏ hàng</a>
                                    <?php else : ?>
                                        <span class="add-to-cart btn btn-outline-red border-2 py-2 px-4 mt-2" id="btnThemVaoGioHang" >Sản phẩm ngừng kinh doanh</span>
                                    <?php endif ?>
                                    
                                    <a class="like btn  border-2 py-2 px-4 mt-2 rounded-pill" href="#"><span class="fa fa-heart"></span></a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="container-fluid">
                    <h3>Thông tin chi tiết về Sản phẩm</h3>
                    <div class="row">
                        <div class="col">
                            LƯU Ý: màu son mỗi người dùng sẽ có mỗi khác mọi người nha.
<br>🌺Là 1 thỏi son với hiệu ứng 2 trong 1:
<br>➖Lên màu vivid tint cực đẹp lấy cảm hứng từ màu sắc của từng cánh hoa.
<br>➖Lần đầu tiên 1 thỏi son tint chứa đựng thành phần dưỡng môi đáng kinh ngạc. Bao gồm rosehip oil, rose water và acacia collagen phục hồi làn môi thâm, nứt nẻ một cách hoàn hảo.
<br>🌺Rosehip Oil chính là tinh dầu Tầm Xuân – đây là một loại tinh dầu thích hợp dùng cho làn môi nứt nẻ, hằn sâu, nhiều vết thâm và thường xuyên mất nước.
<br>🌺Omega 3, Omega 6 và các a-xít béo thiết yếu: Các hợp chất lipid (chất béo) trong các chất này là nhân tố quan trọng trong quá trình dưỡng ẩm đối với làn môi khô và cải thiện độ mềm mại và độ đàn hồi của môi. Các axit béo thiết yếu rất quan trọng đối với sức khỏe của da của chúng ta, tuy nhiên cơ thể của chúng ta lại không thể tạo ra chúng – vì vậy dưỡng chất này giống như bổ sung những gì còn thiếu cho làn da, làm thỏa mãn “cơn khát”
<br>🌺Acacia Collagen : là một kết hợp giữa collagen và Phyto, có tính chất làm se, kích thích các tế bào da sản xuất thêm collagen. Giúp làn da môi phục hồi nhanh chóng và giữ suốt 24h.
</div>
<h1>Bình Luận</h1>
<div class="comment"></div>
<?php foreach($comments as $comment ) : ?>
    <p>
        <b><?= $comment['fullname'] ?></b> <?= date('d-m-Y H:i:s', strtotime($comment['created_at']) ) ?> <br>
        <?= $comment['content'] ?>
    </p>
    <?php endforeach ?>
</div>
<?php if(isset($_SESSION['user'])) : ?>
    <form action="" method="post">
        <textarea name="content" rows="3" cols="60" required id=""></textarea>
        <br>
        <button type="submit">Gửi</button>
    </form>
    <?php else: ?>
        <div>Bạn cần <a href="<?= ROOT_URL .  '?ctl=login'?>">đăng nhập</a>  để bình luận</div>
<?php endif ?>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>