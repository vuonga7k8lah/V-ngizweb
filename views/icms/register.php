<?php

use baitap\core\Request;
use baitap\Model\CommentModel;
use baitap\Model\HomeModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';

?>
    <div id="content">
        <div class="error" style="color: red">
            <?php if (isset($_SESSION['register']['first_name'])) echo $_SESSION['register']['first_name']; ?> <br>
            <?php if (isset($_SESSION['register']['last_name'])) echo $_SESSION['register']['last_name']; ?><br>
            <?php if (isset($_SESSION['register']['email'])) echo $_SESSION['register']['email']; ?><br>
            <?php if (isset($_SESSION['register']['password2'])) echo $_SESSION['register']['password2']; ?><br>
            <?php if (isset($_SESSION['register']['password1'])) echo $_SESSION['register']['password1']; ?><br>
        </div>
        <form action="<?=\baitap\core\URL::uri('register')?>" method="post">
            <fieldset>
                <legend>Register</legend>
                <div>
                    <label for="First Name">First Name <span class="required">*</span>
                    </label>
                    <input type="text" name="first_name" size="20" maxlength="20" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" tabindex='1' />
                </div>

                <div>
                    <label for="Last Name">Last Name <span class="required">*</span>
                    </label>
                    <input type="text" name="last_name" size="20" maxlength="40" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" tabindex='2' />
                </div>

                <div>
                    <label for="email">Email <span class="required">*</span>
                    </label>
                    <input type="text" name="email" id="email" size="20" maxlength="80" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email'], ENT_COMPAT, 'UTF-8'); ?>" tabindex='3' />
                    <span id="available"></span>
                </div>

                <div>
                    <label for="password">Password <span class="required">*</span>
                    </label>
                    <input type="password" name="password1" size="20" maxlength="20" value="<?php if(isset($_POST['password1'])) echo $_POST['password1']; ?>" tabindex='4' />
                </div>

                <div>
                    <label for="email">Confirm Password <span class="required">*</span>
                    </label>
                    <input type="password" name="password2" size="20" maxlength="20" value="<?php if(isset($_POST['password12'])) echo $_POST['password2']; ?>" tabindex='5' />
                </div>
            </fieldset>
            <p><input type="submit" value="Register" /></p>
        </form>
    </div>
<?php
require_once 'views/navigationB.php';
require_once 'views/footer.php';