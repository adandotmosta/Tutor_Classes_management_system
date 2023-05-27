<section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="assets/img/logo.png" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Reset your password</h2>
                    <form method="POST" action='index.php?action=do_forgotpswrd' class="register-form" id="login-form">
                    <?php if (isset($vars['error_message'])){ ?><b style="color:red;"><?php echo $vars['error_message'] ?></b> <?php } ?>
                    <?php if (isset($vars['success_message'])){ ?><b style="color:red;"><?php echo $vars['success_message'] ?></b> <?php } ?>
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="your_name" placeholder="<?php echo LANG_EMAIL_RESET;?>"/>
                        </div>                       
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Send"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>