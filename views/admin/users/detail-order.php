
<?php include_once ROOT_DIR . "views/clients/header.php" ?>
<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4>Chi tiết đơn hàng</h4>
            </div>
            <div class="card-body">
                <!-- Thông tin đơn hàng -->
                <div class="mb-4">
                    <h5>Mã đơn hàng: #<?= $order['id']?></h5>
                    <p><strong>Ngày đặt hàng:</strong><?= date('d-m-y H:i:s', strtotime($order['created_at']))?></p>
                    <p><strong>Trạng thái: <span class="btn btn-success"><?= getOderStatus($order['status']) ?></span></strong></p>
                </div>

                <!-- Thông tin khách hàng -->
                <div class="mb-4">
                    <h5>Thông tin khách hàng</h5>
                    <p><strong>Họ tên:</strong> <?= $order['fullname']?></p>
                    <p><strong>Email:</strong><?= $order['email']?></p>
                    <p><strong>Điện thoại:</strong> <?= $order['phone']?></p>
                    <p><strong>Địa chỉ:</strong> <?= $order['address']?></p>
                </div>

                <!-- Danh sách sản phẩm -->
                <div class="mb-4">
                    <h5>Danh sách sản phẩm</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>image</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_details as $stt => $detail): ?>
                            <tr>
                                <td><?= $stt+1?></td>
                                <td><?= $detail['name']?></td>
                                <td>
                                    <img src="<?= ROOT_URL . $detail['image']?>"
                                    width="60" alt="">
                                </td>
                                <td><?= number_format($detail['price'])?></td>
                                <td><?= $detail['quantity']?></td>
                                <td><?= number_format($detail['price'] * $detail['quantity'])?>vnd</td>
                            </tr>
                            <?php endforeach?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-end">Tổng cộng:</th>
                                <th><?= number_format($order['total_price'])?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                
                <div class="mb-4">
                    <?php if($order['status'] == 1) : ?>
                        <form action="" method="post">     
                         <button class="btn btn-danger">Hủy Đơn Hàng</button>   
                        </form>
                    
                    <?php endif ?>
                </div>

                <!-- Nút thao tác -->
                <div class="d-flex justify-content-between">
                    <a href="/admin/orders" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>

                </div>
            </div>
        </div>
    </div>
<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
