<?php

use baitap\core\Request;
use baitap\Model\HomeModel;

require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';
$id = Request::uri()[1];
$data = HomeModel::getCategoriesMenu($id);
if ($data[0] > 0) {
    ?>
    <div id="content">
        <?php foreach ($data[1] as $key =>$values): ?>
            <div class='post'>
                <h2><a href='<?php echo \baitap\core\URL::uri('paid').'/'.$values[1]?>'><?=$values[0]?></a></h2>
                <p><?=the_excerpt($values[2])?> ... <a href='<?php echo \baitap\core\URL::uri('paid').'/'.$values[1]?>'>Read more</a></p>
                <p class='meta'><strong>Posted by:</strong> <a href='author.php?aid={$pages['user_id']}'><?=$values[4]?></a> | <strong>On: </strong> <?=$values[3]?></p>
            </div>
        <?php endforeach;?>
    </div><!--end content-->
    <?php
} else {
    ?>
    <div id="content">

        <h2>There are currenlty no post in this category.</h2>

    </div>
    <?php
}
require_once 'views/footer.php';