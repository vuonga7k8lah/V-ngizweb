<?php
isLoginAdmin();

use baitap\core\URL;
use baitap\Model\CategoriesModel;
use baitap\core\Request;
use baitap\Model\UserModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';
$id = Request::uri()[1];
$user = UserModel::SelectUser($id);
?>
    <div id="content">
        <h2>Edit user: <?php echo $user['first_name'] . " " . $user['last_name']; ?> </h2>
        <?php if (isset($message)) {
            echo $message;
        } ?>

        <form action="<?=URL::uri('edit_user')?>" method="post">
            <input type="hidden" name="user_id" value="<?=$user['user_id']?>">
            <fieldset>
                <legend>User Info</legend>
                <div>
                    <label for="first-name">First Name
                    </label>
                    <input type="text" required name="first_name"
                           value="<?php if (isset($user['first_name'])) echo strip_tags($user['first_name']); ?>"
                           size="20" maxlength="40" tabindex='1'/>
                </div>

                <div>
                    <label for="last-name">Last Name </label>
                    <input type="text" required name="last_name"
                           value="<?php if (isset($user['last_name'])) echo strip_tags($user['last_name']); ?>"
                           size="20" maxlength="40" tabindex='1'/>
                </div>

                <div>
                    <label for="email">Email
                    </label>
                    <input type="email" required name="email" value="<?php if (isset($user['email'])) echo $user['email']; ?>"
                           size="20" maxlength="40" tabindex='3'/>
                </div>

                <div>
                    <label for="User Level">User Level:
                    </label>
                    <select name="user_level">
                        <?php
                        // Set up array for roles
                        $roles = array(0 => 'Registered Member', 2 => 'Admin');
                        foreach ($roles as $key => $role) {
                            echo "<option value='{$key}'";
                            if ($key == $user['level']) {
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