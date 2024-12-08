<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">ho ten</th>
      <th scope="col">Phone</th>
      <th scope="col">phuong thuc thanh toan</th>
      <th scope="col">trang thai</th>
      <th scope="col">tong tien</th>
      <th scope="col">ngay mua</th>
      <th scope="col">hanh dong</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($orders as $order): ?>
    <tr>
      <th scope="row"><?= $order['id']?></th>
      <td><?= $order['fullname']?></td>
      <td><?= $order['phone']?></td>
      <td><?= $order['payment_method']?></td>
      <td><?= getOderStatus($order['status'])?></td>
      <td><?= number_format($order['total_price'])?>VND</td>
      <td><?= $order['created_at']?></td>
      <td>
        <a href="<?= ADMIN_URL . '?ctl=detail-order&id=' . $order['id'] ?>" class="btn btn-primary">update</a>
      </td>

    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>


<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
