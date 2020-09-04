<?php
require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';

use baitap\core\URL; ?>
    <div id="content">
        <form id="contact" action="<?= URL::uri('contact') ?>" method="post">
            <div class="error" style="color: red">
                <?php if (isset($_SESSION['contact']['email'])) echo $_SESSION['contact']['email']; ?> <br>
                <?php if (isset($_SESSION['contact']['comment'])) echo $_SESSION['contact']['comment']; ?><br>
                <?php if (isset($_SESSION['contact']['name'])) echo $_SESSION['contact']['name']; ?><br>
                <?php if (isset($_SESSION['contact']['captcha'])) echo $_SESSION['contact']['captcha']; ?><br>
            </div>
            <div class="success">
                <?php if(isset($_SESSION['suss_contact'])) echo $_SESSION['suss_contact'];?>
            </div>
            <fieldset>
                <legend>Contact</legend>
                <div>
                    <label for="Name">Your Name: <span class="required">*</span>
                    </label>
                    <input type="text" name="name" required id="name" value="<?php if (isset($_SESSION['valuesContact']['name'])) {
                        echo $_SESSION['valuesContact']['name'];} ?>" size="20" maxlength="80" tabindex="1"/>
                </div>
                <div>
                    <label for="email">Email: <span class="required">*</span>

                    </label>
                    <input type="email" name="email" id="email" required value="<?php if (isset($_SESSION['valuesContact']['email'])) {
                        echo $_SESSION['valuesContact']['email'];} ?>" size="20" maxlength="80" tabindex="2"/>
                </div>
                <div>
                    <label for="comment">Your Message: <span class="required">*</span></label>
                    <div id="comment"><textarea name="comment"  required rows="10" cols="50"
                                                tabindex="3"><?php if (isset($_SESSION['valuesContact']['comment'])) {
                                echo $_SESSION['valuesContact']['comment'];
                            } ?></textarea></div>
                </div>

                <div>
                    <label for="captcha">Phiền bạn điền vào giá trị số cho câu hỏi sau: <?php echo captcha(); ?><span
                                class="required">*</span></label>
                    <input type="text" required name="captcha" id="captcha" value="" size="20" maxlength="5" tabindex="4"/>
                </div>
            </fieldset>
            <div><input type="submit" value="Send Email" tabindex="3"/></div>
        </form>
    </div><!--end content-->
<?php
require_once 'views/footer.php';