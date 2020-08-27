<?php

use baitap\core\URL;
use baitap\Model\CategoriesModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';

?>
    <div id="content">
        <h2>Manage Pages</h2>
        <table>
            <thead>
            <tr>
                <th>STT</th>
                <th><a href="<?php echo URL::uri('order_pages').'/1'?>">Pages</a></th>
                <th><a href="<?php echo URL::uri('order_pages').'/2'?>">Posted on</th>
                <th><a href="<?php echo URL::uri('order_pages').'/3'?>">Posted by</th>
                <th>Content</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            isset($_SESSION['order_by_page'])?$order_by=$_SESSION['order_by_page']:$order_by='page_id';
            \baitap\core\Session::destroy("order_by_page");
            $data = \baitap\Model\PagesModel::selectListPages($order_by);
            $i = 1;
            foreach ($data as $key => $values):
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $values[1] ?></td>
                    <td><?= $values[2] ?></td>
                    <td><?= $values[3] ?></td>
                    <td><?= $values[4] ?></td>
                    <td><a class='edit' href='<?php echo URL::uri('edit_pages').'/'.$values[0]?>'>Edit</a></td>
                    <td><a class='delete' href='<?php echo URL::uri('delete_pages').'/'.$values[0]?>'>Delete</a>
                    </td>
                </tr>
                <?php $i++; endforeach; ?>


            </tbody>
        </table>
    </div>
<?php
require_once 'views/footer.php';