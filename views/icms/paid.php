<?php

use baitap\core\Request;
use baitap\Model\CommentModel;
use baitap\Model\HomeModel;

$id = Request::uri()[1];
$x = HomeModel::getPageSingle($id);
$title = $x['page_name'];
$x['page_view']=view_counter($x['page_id']);
$dataPages[] = array(
    'page_name' => $x['page_name'],
    'content' => $x['content'],
    'name' => $x['name'],
    'date' => $x['date'],
    'user_id' => $x['user_id'],
    'count'=>$x['count'],
    'page_id'=>$x['page_id'],
    'page_view'=>$x['page_view']
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
                    <strong>Posted by:</strong><a href='<?=\baitap\core\URL::uri('author').'/'.$row['user_id']?>'><?= $row['name'] ?></a> |
                    <strong>On: </strong> <?= $row['date'] ?>
                    <strong>Page views: </strong> <?= $row['page_view'] ?>
                </p>
            <?php endforeach; ?>
        </div>
        <div class="success">
            <?php if (isset($_SESSION['suss'])) echo $_SESSION['suss']; ?>
        </div>
        <div class="error" style="color: red">
            <?php if (isset($_SESSION['mess']['email'])) echo $_SESSION['mess']['email']; ?> <br>
            <?php if (isset($_SESSION['mess']['comment'])) echo $_SESSION['mess']['comment']; ?><br>
            <?php if (isset($_SESSION['mess']['name'])) echo $_SESSION['mess']['name']; ?><br>
        </div>
        <?php
        $a = CommentModel::selectAllComment($id);
        if ($a[0] > 0) {
            ?>
            <div style="text-align: center"><h2>Những Comment Về Bài Viết:</h2></div>
            <ol id='disscuss'>
                <?php foreach ($a[1] as $value): ?>
                <li class='comment-wrap'>
                    <p class='author'><?=$value[1]?></p>
                    <p class='comment-sec'><?=$value[2]?></p>
<!--                    if(is_admin()) echo "<a id='{$cmt_id}' class='remove'>Delete</a>";-->

                    <p class='date'><?=$value[3]?></p>
                </li>
                <?php endforeach; ?>
            </ol>
        <?php
        }else{
            echo "<h2> Be the first to leave a comment.</h2>";
        }
        ?>
        <?php require_once 'views/icms/comment_Form.php'; ?>
    </div>
<?php
require_once 'views/navigationB.php';
require_once 'views/footer.php';