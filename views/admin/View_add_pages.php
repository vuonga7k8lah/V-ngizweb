<?php

use baitap\core\URL;
use baitap\Model\CategoriesModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';

?>
    <div id="content">
        <h2>Create a page</h2>
        <?php if (!empty($messages)) echo $messages; ?>
        <form id="add_page" action="<?php echo URL::uri('add_pages') ?>" method="post">
            <fieldset>
                <legend>Add a Page</legend>
                <div>
                    <label for="page">Page Name: <span class="required">*</span>
                        <!--                        --><?php
                        //                        if(isset($errors) && in_array('page_name', $errors)) {
                        //                            echo "<p class='warning'>Please fill in the page name</p>";
                        //                        }
                        //                        ?>
                    </label>
                    <input type="text" name="page_name" id="page_name"
                           value="<?php if (isset($_POST['page_name'])) echo strip_tags($_POST['page_name']); ?>"
                           size="20" maxlength="80" tabindex="1" required/>
                </div>

                <div>
                    <label for="category">All categories: <span class="required">*</span>
                    </label>

                    <select name="category">
                        <?php
                        $db = CategoriesModel::SelectCategory();
                        foreach ($db as $item => $value) {
                            echo "<option value='{$value[0]}'>" . $value[1] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="position">Position: <span class="required">*</span>
                    </label>
                    <select name="position">
                        <?php
                        $oOption = CategoriesModel::countCat_id();
                        if ($oOption[0] === 1) {
                            list($num) = $oOption[1];
                            for ($i = 1; $i <= $num + 1; $i++) { // Tao vong for de ra option, cong them 1 gia tri cho position
                                echo "<option value='{$i}'";
//                                if(isset($_POST['position']) && $_POST['position'] == $i) echo "selected='selected'";
                                echo ">" . $i . "</otption>";
                            }

                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="page-content">Page Content: <span class="required">*</span>
                    </label>
                    <textarea name="content" required cols="50"
                              rows="20"><?php if (isset($_POST['content'])) echo htmlentities($_POST['content'], ENT_COMPAT, 'UTF-8'); ?></textarea>)
                </div>
            </fieldset>
            <p><input type="submit" name="submit" value="Add Page"/></p>
        </form>

    </div><!--end content-->
<?php
require_once 'views/footer.php';