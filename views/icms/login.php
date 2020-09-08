<?php

use baitap\core\Request;
use baitap\Model\CommentModel;
use baitap\Model\HomeModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';

?>
    <div id="content">
        <form id="login" action="<?=\baitap\core\URL::uri('login')?>" method="post">
            <div class="error">
                <?php if(isset($_SESSION['error_login'])) echo $_SESSION['error_login'];?>
            </div>
            <fieldset>
                <legend>Login</legend>
                <div>
                    <label for="email">Email:
                    </label>
                    <input type="email" required name="email" id="email" value="<?php echo (isset($_SESSION['value_email'])?$_SESSION['value_email']:'');?>" size="20" maxlength="80" tabindex="1" />
                </div>
                <div>
                    <label for="pass">Password:
                    </label>
                    <input type="password" required name="password" id="pass" value="" size="20" maxlength="20" tabindex="2" />
                </div>
            </fieldset>
            <div><input type="submit" value="Login" /></div>
        </form>
        <p><a href="<?=\baitap\core\URL::uri('forgot')?>">Forgot password?</a></p>
    </div><!--end content-->

<?php
require_once 'views/navigationB.php';
require_once 'views/footer.php';