<?php

use baitap\core\Request;
use baitap\Model\CommentModel;
use baitap\core\URL;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';
$so_page = 4;
if (!isset(Request::uri()[1])) {
    $current_page = 1;
} else {
    $current_page = Request::uri()[1]; //Trang hiện tại
}
$id=1;
$offset = ($current_page - 1) * $so_page;
$totalRecords = CommentModel::SelectPagination();
$sotrang = ceil($totalRecords / $so_page);
$sp = CommentModel::SelectAllPagination($id, $offset);
?>
    <div id="content">
        <?php
        if ($sp[0] > 0) {
            ?>
            <?php foreach ($sp[1] as $values):?>
            <div class='post'>
                    <h2><a href='<?php echo \baitap\core\URL::uri('paid').'/'.$values[0]?>'><?=$values[1]?></a></h2>
                    <p><?=the_excerpt($values[2])?> ... <a href='<?php echo \baitap\core\URL::uri('paid').'/'.$values[0]?>'>Read more</a></p>
                    <p class='meta'><strong>Posted by:</strong> <a href='<?=\baitap\core\URL::uri('author').'/'.$values[5]?>'><?=$values[4]?></a> | <strong>On: </strong> <?=$values[3]?></p>
            </div>
            <?php endforeach;?>
                <div class="pagination" style="text-align: center">
                    <?php for ($b = 1; $b <= $sotrang; $b++) {
                        echo '<a href="' . URL::uri('author') . '/' . $b . '">' . $b . '</a>';
                    }
                    ?>
                </div>
            <?php
        }else{

        }
        ?>
    </div>
<?php
require_once 'views/footer.php';