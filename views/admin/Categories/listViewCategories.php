<?php
isLoginAdmin();
use baitap\core\URL;
use baitap\Model\CategoriesModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';
?>
    <div id="content">
        <div style="color: #3399ff"><?php if (isset($_SESSION['success_update'])){ echo $_SESSION['success_update'];} ?></div>
        <div style="color: #3399ff"><?php if (isset($_SESSION['success_delete'])){ echo $_SESSION['success_delete'];} ?></div>
        <h2>Manage Categories</h2>
        <table>
            <thead>
            <tr>
                <th>STT</th>
                <th><a href="<?php echo URL::uri('order_categories').'/1'?>">Categories</a></th>
                <th><a href="<?php echo URL::uri('order_categories').'/2'?>">Position</th>
                <th><a href="<?php echo URL::uri('order_categories').'/3'?>">Posted by</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            isset($_SESSION['order_by'])?$order_by=$_SESSION['order_by']:$order_by='position';
            \baitap\core\Session::destroy("order_by");
            $data = CategoriesModel::selectListCatagory($order_by);
            $i = 1;
            foreach ($data as $key => $values):
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $values[1] ?></td>
                    <td><?= $values[2] ?></td>
                    <td><?= $values[4] ?></td>
                    <td><a class='edit' href='<?php echo URL::uri('edit_categories').'/'.$values[0]?>'>Edit</a></td>
                    <td><a class='delete' href='<?php echo URL::uri('delete_categories').'/'.$values[0]?>'>Delete</a>
                    </td>
                </tr>
                <?php $i++; endforeach; ?>

            </tbody>
        </table>
    </div><!--end content-->
<?php
require_once 'views/footer.php';