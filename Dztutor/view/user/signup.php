<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" action="index.php?action=do_signup" class="register-form" id="register-form">
                    <?php if (isset($vars['error_message'])) { ?><b style="color:red;"><?php echo $vars['error_message'] ?></b><?php } ?>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Your School Name" required />
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" placeholder="School Email" required/>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="ownerFName" placeholder="Owner First Name" required/>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="ownerLName" id="email" placeholder="Owner Last Name" required/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="text" name="location"  placeholder="School Location" required/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Check this if the school will use the session system</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                    <!-- user exists handling --> 
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="assets/img/logo-small.png" alt="signup image"></figure>
                <a href="index.php?action=login" class="signup-image-link">I am already a member</a>
            </div>
        </div>
    </div>
</section>

<style>
    /* Add this CSS code */
    @media screen and (max-width: 480px) {
        .signup-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .signup-image {
          display:none;
        }
    }
</style>

