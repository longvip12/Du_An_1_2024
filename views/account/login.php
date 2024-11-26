
<?php require_once ROOT_DIR . "views/account/header.php" ?>    
        <div class="form-container sign-in-container">
            <?php if ($message != '') : ?>
                <div class="alert alert-success">
                    <?= $message ?>
                </div>
            <?php endif ?>
            <?php if ($erron != '') : ?>
                <div class="alert alert-success">
                    <?= $erron ?>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL . '?ctl=login' ?>" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="password"/>
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
<?php require_once ROOT_DIR . "views/account/overlay.php" ?>    
<?php require_once ROOT_DIR . "views/account/register.php" ?>
<?php require_once ROOT_DIR . "views/account/footer.php" ?>


    
