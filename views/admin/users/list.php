<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Quyền</th>
      <th scope="col">Hoạt động</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">

      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user) : ?>
    <tr>
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['fullname'] ?></td>
      <td><?= $user['email'] ?></td>
      <td><?= $user['phone'] ?></td>
      <td><?= $user['role'] ?></td>
      <td>
        <?php if($user['active'] == 1) : ?>
            <span class="badge bg-success">
                <span class="badge bg-success">
                Hoạt Động
            </span>
            </span>
        <?php else : ?>
            <span class="badge bg-danger">
                Khóa
            </span>
        <?php endif ?>
      </td>
      <td>
            <?= $user['address'] ?>
      </td>
      <td>
            <a href="<?= ADMIN_URL . '?ctl=edituser&id=' . $user['id'] ?>" class="btn btn-primary">EDIT</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>


<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
