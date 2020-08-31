<?php

use baitap\core\Request;
use baitap\Model\HomeModel;

$id = Request::uri()[1];
$x = HomeModel::getPageSingle($id);
$title = $x['page_name'];
$dataPages[]= array(
    'page_name' => $x['page_name'],
    'content' => $x['content'],
    'name' => $x['name'],
    'date' => $x['date'],
    'user_id' => $x['user_id']
);
require_once 'views/header.php';
require_once 'views/navigation.php';
require_once 'views/section-navigation.php';
?>
    <div id="content">
        <div class='post'>
            <?php
            foreach ($dataPages as $row):?>
            <h2><?= $row['page_name'] ?></h2>
            <p><?= $row['content'] ?></p>
            <p class='meta'>
                <strong>Posted by:</strong><a href=''><?= $row['name'] ?></a> |
                <strong>On: </strong> <?= $row['date'] ?>
                <!--                <strong>Page views: </strong> --><? //=$data['content']?>
            </p>
            <?php endforeach; ?>
        </div>
    </div>
<?php
require_once 'views/footer.php';