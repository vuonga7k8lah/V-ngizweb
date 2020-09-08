<?php
isLoginAdmin();
use baitap\core\URL;
use baitap\Model\CategoriesModel;
use baitap\Model\PagesModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/admin/sidebar-admin.php';
$id=\baitap\core\Request::uri()[1];
$page=PagesModel::selectOfEdit($id);
?>
    <div id="content">
        <div style="color: #3399ff"><?php if (isset($_SESSION['success_update_page'])){ echo $_SESSION['success_update'];} ?></div>
        <div style="color: #3399ff"><?php if (isset($_SESSION['success_delete_page'])){ echo $_SESSION['success_delete'];} ?></div>
        <form id="edit_page" action="<?php echo URL::uri('edit_pages')?>" method="post">
            <fieldset>
                <legend><h2>Edit page: <?= $page['page_name']?></h2></legend>
                <input type="hidden" name="page_id" value="<?=$page['page_id']?>">
                <div>
                    <label for="page">Page Name: <span class="required">*</span>
                    </label>
                    <input type="text" name="page_name" id="page_name" required
                           value="<?= $page['page_name']?>" size="20"
                           maxlength="80"
                           tabindex="1"/>
                </div>

                <div>
                    <label for="category">All categories: <span class="required">*</span>
                    </label>
                    <select name="cat_id">
                        <?php
                        $oCategory = PagesModel::selectCategory();
                        if ($oCategory[0] > 0) {
                            $num = $oCategory[1];
                            foreach ($num as $key => $value) { // Tao vong for de ra option, cong them 1 gia tri cho position
                                echo "<option value='{$value[0]}'";
                                echo ">" . $value[1] . "</otption>";
                            }

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
                            for ($i = 1; $i <= $num; $i++) { // Tao vong for de ra option, cong them 1 gia tri cho position
                                echo "<option value='{$i}'";
                                echo ">" . $i . "</otption>";
                            }

                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="page-content">Page Content: <span class="required">*</span>
                    </label>
                    <textarea name="content" required cols="50" rows="10"><?php echo htmlentities($page['content'], ENT_COMPAT, 'UTF-8'); ?></textarea>
                </div>
            </fieldset>
            <p><input type="submit" value="Save Changes"/></p>
        </form>

    </div><!--end content-->
<?php
require_once 'views/footer.php';