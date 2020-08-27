<?php

use baitap\core\URL;
use baitap\core\Request;
use baitap\Model\CategoriesModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';
$id=Request::uri()[1];
$row=CategoriesModel::selectOneCategory($id);
?>
    <div id="content">
        <h2>Edit category</h2>
        <div style="color:red;"><?php if (isset($_SESSION['error_unique_category'])) echo $_SESSION['error_unique_category']; ?></div>
        <form id="edit_cat" action="<?php echo URL::uri('edit_categories') ?>" method="post">
            <fieldset>
                <input type="hidden" name="cat_id" value="<?=$row['cat_id']?>">
                <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
                <legend>Edit category</legend>
                <div>
                    <label for="category">Category Name: <span class="required">*</span>
                    </label>
                    <input type="text" name="category" id="category"
                           value="<?=$row['cat_name']?>"
                           size="20" maxlength="150" tabindex="1"/>
                </div>
                <div>
                    <label for="position">Position: <span class="required">*</span>
                    </label>
                    <select name="position" tabindex='2'>
                        <option value="<?=$row['position']?>"><?=$row['position']?></option>
                        <?php
                        $oOption = CategoriesModel::countCat_id();
                        if ($oOption[0] === 1) {
                            list($num) = $oOption[1];
                            for ($i = 1; $i <= $num; $i++) { // Tao vong for de ra option, cong them 1 gia tri cho position
                                if ($i==$row['position']){
                                    continue;
                                }
                                echo "<option value='{$i}'";
                                echo ">" . $i . "</otption>";
                            }

                        }
                        ?>
                    </select>
                </div>
            </fieldset>
            <p><input type="submit" value="Edit Category"/></p>
        </form>

    </div>
<?php
require_once 'views/footer.php';