<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="assets/img/logo.png" alt="sing up image"></figure>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Reset Password</h2>
                <form method="POST" action='index.php?action=do_Reset&secret=<?php echo $_GET["secret"] ?>&token=<?php echo $_GET["token"] ?>' class="register-form" id="login-form">
                    <?php if (isset($ret['error'])){ ?><b style="color:red;"><?php echo $ret['error'] ?></b> <?php } ?>
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="your_name" placeholder="<?php echo LANG_PASSWORD_RESET;?>"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="confirm_password" id="your_pass" placeholder="<?php echo LANG_PASSWORD_RESET_CONFIRM;?>"/>
                    </div>
                    
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Reset"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>