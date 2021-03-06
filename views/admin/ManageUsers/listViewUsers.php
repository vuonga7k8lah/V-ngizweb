<?php
isLoginAdmin();
use baitap\core\URL;
use baitap\Model\CategoriesModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';

?>
    <div id="content">
        <h2>Manage Users</h2>
        <div class="success"><?php if (isset($_SESSION['suss_update'])) echo $_SESSION['suss_update'];?></div>
        <table>
            <thead>
            <tr>
                <th>STT</th>
                <th><a href="">First Name</a></th>
                <th><a href="">Last Name</a></th>
                <th><a href="">Email</a></th>
                <th><a href="">User Level</a></th>
                <th>Edit User</th>
                <th>Delete User</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $users=\baitap\Model\UserModel::selectAllUsers();
            $i=1;
            // In ket qua ra trinh duyet
            foreach ($users as $key=>$values):
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$values[1]?></td>
                    <td><?=$values[2]?></td>
                    <td><?=$values[3]?></td>
                    <td><?=$values[4]?></td>
                    <td><a class='edit' href='<?php echo URL::uri('edit_user').'/'.$values[0]?>'>Edit</a></td>
                    <td><a class='delete' href='<?php echo URL::uri('delete_user').'/'.$values[0]?>'>Delete</a></td>
                <tr>
                <?php
                $i++;
                endforeach;
            // End foreach
            ?>
            </tbody>
        </table>
    </div>
<?php
require_once 'views/footer.php';