<?php
require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';
?>
    <div id="content">
        <form id="login" action="<?=\baitap\core\URL::uri('forgot1')?>" method="post">
            <fieldset>
                <legend>New Password</legend>
                <div>
                    <label for="email">Password: </label>
                    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id_forgot']?>">
                    <input type="password" name="password" id="email"size="40" maxlength="80" tabindex="1" />
                </div>
            </fieldset>
            <div><input type="submit"  value="Save Password" /></div>
        </form>
    </div><!--end content-->
<?php
require_once 'views/footer.php';