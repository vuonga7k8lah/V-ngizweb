<?php

use baitap\core\URL;
use baitap\Model\CategoriesModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';
?>
<div id="content">
    <h2>Create a category</h2>
    <div style="color:red;"><?php if (isset($_SESSION['error_unique_category'])) echo $_SESSION['error_unique_category']; ?></div>
    <form id="add_cat" action="<?php echo URL::uri('add_categories') ?>" method="post">
        <fieldset>
            <legend>Add category</legend>
            <div>
                <label for="category">Category Name: <span class="required">*</span>
                    <?php
                    if (isset($errors) && in_array('category', $errors)) {
                        echo "<p class='warning'>Please fill in the category name</p>";
                    }
                    ?>

                </label>
                <input type="text" name="category" id="category"
                       value="<?php if (isset($_POST['category'])) echo strip_tags($_POST['category']); ?>"
                       size="20" maxlength="150" tabindex="1"/>
            </div>
            <div>
                <label for="position">Position: <span class="required">*</span>
                    <?php
                    if (isset($errors) && in_array('position', $errors)) {
                        echo "<p class='warning'>Please pick a position</p>";
                    }
                    ?>

                </label>
                <select name="position" tabindex='2'>
                    <?php
                        $oOption = CategoriesModel::countCat_id();
                        if($oOption[0]===1){
                            list($num)=$oOption[1];
                            for($i=1; $i<=$num+1; $i++) { // Tao vong for de ra option, cong them 1 gia tri cho position
                                echo "<option value='{$i}'";
//                                if(isset($_POST['position']) && $_POST['position'] == $i) echo "selected='selected'";
                                echo ">".$i."</otption>";
                        }

                        }
                        ?>
                </select>
            </div>
        </fieldset>
        <p><input type="submit" value="Add Category"/></p>
    </form>

</div>
<?php
require_once 'views/footer.php';