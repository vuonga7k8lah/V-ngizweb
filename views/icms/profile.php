<?php
require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';
isLogin();
?>
    <div id="content">
        <?php if(!empty($message)) echo $message; ?>
        <h2>User Profile</h2>
        <?php
         //Truy xuat csdl de hien thi thong tin nguoi dung
        $user = \baitap\Model\UserModel::SelectUser($_SESSION['uid']);
        ?>

        <form enctype="multipart/form-data" action="<?=\baitap\core\URL::uri('profile')?>" method="post">
            <fieldset>
                <legend>Avatar</legend>
                <div>
                    <img class="avatar" src="./assets/uploads/images/<?php echo (is_null($user['avarta']) ? "no_avatar.jpg" : $user['avarta']); ?>" alt="avatar" />
                    <p>Please select a JPEG or PNG image of 512Kb or smaller to use as avatar<p>
                        <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
                        <input type="file" name="image" />
                    <p><input class="change" type="submit"  value="Save changes" /></p>
                </div>
            </fieldset>
        </form>

        <form action="<?=\baitap\core\URL::uri('updateUser')?>" method="post">
            <fieldset>
                <legend>User Info</legend>
                <div>
                    <label for="first-name">First Name
                        <?php if(isset($errors) && in_array('first_name',$errors)) echo "<p class='warning'>Please enter your first name.</p>";?>
                    </label>
                    <input type="text" name="first_name" value="<?php if(isset($user['first_name'])) echo strip_tags($user['first_name']); ?>" size="20" maxlength="40" tabindex='1' />
                </div>

                <div>
                    <label for="last-name">Last Name
                        <?php if(isset($errors) && in_array('last name',$errors)) echo "<p class='warning'>Please enter your last name.</p>";?>
                    </label>
                    <input type="text" name="last_name" value="<?php if(isset($user['last_name'])) echo strip_tags($user['last_name']); ?>" size="20" maxlength="40" tabindex='1' />
                </div>
            </fieldset>
            <fieldset>
                <legend>Contact Info</legend>
                <div>
                    <label for="email">Email
                        <?php if(isset($errors) && in_array('email',$errors)) echo "<p class='warning'>Please enter a valid email.</p>";?>
                    </label>
                    <input type="text" name="email" value="<?php if(isset($user['email'])) echo $user['email']; ?>" size="20" maxlength="40" tabindex='3' />
                </div>

            </fieldset>
            <fieldset>
                <legend>About Yourself</legend>
                <div>
                    <textarea cols="50" rows="20" name="bio"><?php echo (is_null($user['bio'])) ? '' : htmlentities($user['bio'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                </div>
            </fieldset>
            <div><input type="submit" value="Save Changes" /></div>
        </form>
    </div><!--end content-->
<?php
require_once 'views/navigationB.php';
require_once 'views/footer.php';