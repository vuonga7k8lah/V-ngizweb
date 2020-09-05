<?php
require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';
?>
    <div id="content">
        <form id="login" action="<?=\baitap\core\URL::uri('forgot')?>" method="post">
            <div class="error">
                <?php if (isset($_SESSION['error_forgot'])) echo $_SESSION['error_forgot'];?>
            </div>
            <fieldset>
                <legend>Retrieve Password</legend>
                <div>
                    <label for="email">Email: </label>

                    <input type="email" required name="email" id="email" value="<?php ?>" size="40" maxlength="80" tabindex="1" />
                </div>
            </fieldset>
            <div><input type="submit" value="Retrieve Password" /></div>
        </form>
    </div><!--end content-->
<?php
require_once 'views/footer.php';