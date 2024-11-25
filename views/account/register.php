<?php require_once ROOT_DIR . "views/account/header.php" ?>
<?php require_once ROOT_DIR . "views/account/login.php" ?>

<?php require_once ROOT_DIR . "views/account/overlay.php" ?>       
       <div class="form-container sign-up-container">
            <form action="<?= ROOT_URL .'?ctl=register' ?>" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Full Name" name="fullname"/>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="password"/>
                <input type="number" placeholder="Phone Number" name="phone"/>
                <input type="text" placeholder="Address" name="address"/>
                
                <button type="submit">Sign Up</button>
            </form>
        </div>

<?php require_once ROOT_DIR . "views/account/footer.php" ?>
