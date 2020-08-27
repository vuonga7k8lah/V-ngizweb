<?php

use baitap\core\URL;
use baitap\Model\CategoriesModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';

?>
    <div id="content">
        <h2>Edit user: <?php echo $user['first_name'] . " " . $user['last_name']; ?> </h2>
        <?php if (isset($message)) {
            echo $message;
        } ?>

        <form action="" method="post">
            <fieldset>
                <legend>User Info</legend>
                <div>
                    <label for="first-name">First Name
                    </label>
                    <input type="text" name="first_name"
                           value="<?php if (isset($user['first_name'])) echo strip_tags($user['first_name']); ?>"
                           size="20" maxlength="40" tabindex='1'/>
                </div>

                <div>
                    <label for="last-name">Last Name
                        <?php if (isset($errors) && in_array('last name', $errors)) echo "<p class='warning'>Please enter your last name.</p>"; ?>
                    </label>
                    <input type="text" name="last_name"
                           value="<?php if (isset($user['last_name'])) echo strip_tags($user['last_name']); ?>"
                           size="20" maxlength="40" tabindex='1'/>
                </div>

                <div>
                    <label for="email">Email
                        <?php if (isset($errors) && in_array('email', $errors)) echo "<p class='warning'>Please enter a valid email.</p>"; ?>
                    </label>
                    <input type="text" name="email" value="<?php if (isset($user['email'])) echo $user['email']; ?>"
                           size="20" maxlength="40" tabindex='3'/>
                </div>

                <div>
                    <label for="User Level">User Level:
                        <?php if (isset($errors) && in_array('user level', $errors)) echo "<p class='warning'>Please pick a user level.</p>"; ?>
                    </label>
                    <select name="user_level">
                        <?php
                        // Set up array for roles
                        $roles = array(1 => 'Registered Member', 2 => 'Moderator', 3 => 'Super Mod', 4 => 'Admin');
                        foreach ($roles as $key => $role) {
                            echo "<option value='{$key}'";
                            if ($key == $user['user_level']) {
                                echo "selected='selected'";
                            }
                            echo ">" . $role . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </fieldset>

            <div><input type="submit" value="Save Changes"/></div>
    </div><!--end content-->
<?php
require_once 'views/footer.php';