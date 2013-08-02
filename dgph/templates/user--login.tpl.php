<!-- Login -->
<div class="row">
    <div class="login-con">
        <div class="login-con-area">
            <div class="login-left">
                <h4>Login</h4>
                <label>User Name</label>
                <div class="clear"></div>
                <input id="edit-name" name="name" type="text" class="name">
                <label>Password</label>
                <div class="clear"></div>
                <input id="edit-pass" name="pass" type="password" class="password">
                <label>Remember me</label><input type="checkbox" id="checkbox1" style="display: none;">
                <span id="custom-checkbox1" class="custom checkbox"></span>
                <div class="clear"></div>
                <?php
                    print drupal_render($form['form_id']);
                    print drupal_render($form['form_build_id']);
                ?>
                <input id="edit-submit" name="enter" type="submit" value="enter">
                <div class="clear"></div>
                <p>Forgot your password?  /  report problems</p>
            </div>
            <div class="login-mid"><img src="/sites/all/themes/dgph/images/or.png" width="23" height="117"></div>
            <div class="login-right">
                <a href="#"><img src="/sites/all/themes/dgph/images/facebook-login-btn.png" alt=""></a>
                <a href="#"><img src="/sites/all/themes/dgph/images/twitterlogin-btn.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
