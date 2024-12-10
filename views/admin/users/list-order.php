<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container">
  <div>
    <h5>Thông tin khách hàng</h5>
      <p><strong>Họ tên:</strong> <?= $user['fullname']?></p>
      <p><strong>Email:</strong><?= $user['email']?></p>
      <p><strong>Điện thoại:</strong> <?= $user['phone']?></p>
      <p><strong>Địa chỉ:</strong> <?= $user['address']?></p>
  </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>

      <th scope="col">Phương thức thanh toán</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Ngày mua</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($orders as $order): ?>
    <tr>
      <th scope="row"><?= $order['id']?></th>
      <td><?= $order['payment_method']?></td>
      <td><?= getOderStatus($order['status'])?></td>
      <td><?= number_format($order['total_price'])?>VND</td>
      <td><?= $order['created_at']?></td>
      <td>
            <a href="<?= ROOT_URL . '?ctl=order-detail-user&id=' . $order['id'] ?>" class="primary">Chi tiết</a>
      </td>

    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>


<?php include_once ROOT_DIR . "views/clients/footer.php" ?>
