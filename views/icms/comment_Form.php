<?php $_SESSION['id_page']=$id; if (!empty($message)) echo $message;?>
<form id="comment-form" action="<?php echo \baitap\core\URL::uri('comment')?>" method="post">
    <fieldset>
        <legend>Leave a comment</legend>
        <div>
            <input type="hidden" value="<?=$_SESSION['id_page']?>" name="page_id" >
            <label for="name">Name: <span class="required">*</span></label>
            <input type="text" required name="name" id="name" value="<?php if (isset($_SESSION['values']['name'])) {
                echo $_SESSION['values']['name'];
            } ?>" size="20" maxlength="80" tabindex="1"/>
        </div>
        <div>
            <label for="email">Email: <span class="required">*</span>
                <?php if (isset($errors) && in_array('email', $errors)) echo "<span class='warning'>Please enter your email.</span>"; ?>
            </label>
            <input type="email" name="email" required id="email" value="<?php if (isset($_SESSION['values']['email'])) {
                echo $_SESSION['values']['email'];
            } ?>" size="20" maxlength="80" tabindex="2"/>
        </div>
        <div>
            <label for="comment">Your Comment: <span class="required">*</span>
            </label>
            <div id="comment"><textarea name="comment" required rows="10" cols="50"
                                        tabindex="3"><?php if (isset($_SESSION['values']['comment'])) {
                        echo $_SESSION['values']['comment'];
                    } ?></textarea></div>
        </div>

        <div>
            <label for="captcha">Phiền bạn điền vào giá trị số cho câu hỏi sau: <?php echo captcha(); ?><span
                        class="required">*</span>
                <?php if (isset($_SESSION['mess']['captcha']) ) {
                    echo "<span class='warning'>".$_SESSION['mess']['captcha']."</span>";
                } ?></label>
            <input type="text" name="captcha" id="captcha" value="" size="20" maxlength="5" tabindex="4"/>
        </div>

<!--        <div>-->
<!--            <label for="question"> Phiền bạn xóa giá trị ở trường dưới, trước khi submit form.-->
<!--                --><?php //if (isset($errors) && in_array('delete', $errors)) {
//                    echo "<span class='warning'>Bạn quên chưa xóa giá trị.</span>";
//                } ?>
<!--            </label>-->
<!--            <input type="text" name="question" id="question" value="Xóa đi giá trị này" size="20" maxlength="40"/>-->
<!--        </div>-->
<!---->
<!--        <div class='website'>-->
<!--            <label for="website"> Nếu bạn nhìn thấy trường này, thì ĐỪNG điền gì vào hết</label>-->
<!--            <input type="text" name="url" id="url" value="" size="20" maxlength="20"/>-->
<!--        </div>-->
<!---->
<!--        <div>-->
<!--            <label>Điền vào ô reCaptcha-->
<!--                --><?php //if (isset($errors) && in_array('sai captcha', $errors)) {
//                    echo "<span class='warning'>Please give a correct answer.</span>";
//                } ?><!--</label>-->
<!--            </label>-->
<!--            --><?php
//            $publickey = "6Lf-e9oSAAAAAAL43oMxzaLMOC0aTKait1v-dhAk";
//            echo recaptcha_get_html($publickey);
//            ?>
<!--        </div>-->
    </fieldset>
    <div><input type="submit" value="Post Comment"/></div>
<!--    <div class="g-recaptcha" data-sitekey="6LccpcYZAAAAAFDL237UebC_F4YymIXMsl9P7RZV"></div>-->
</form>