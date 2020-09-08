<div id="aside">
    <div class="box">
        <h2>Welcome to izwebz</h2>
        <p>
            Please register to have fully access to our juicies information on the Internet.
        </p>
    </div>
    <div class="box latest">
        <h2>Latest Posts</h2>
        <?php
        use \baitap\core\URL;
        use \baitap\Model\PagesModel;

        if (PagesModel::selectNavB()[0] > 0) {
            $row = PagesModel::selectNavB()[1];
            ?>
            <ul class='totem'>
                <?php foreach ($row as $key =>$value): ?>
                <li>
                    <h3><a href='<?=URL::uri('paid').'/'.$value[0]?>'><?=$value[1]?></a></h3>
                    <p><?=the_excerpt($value[2],30)?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php } else {
            echo "<p> There is currently no post</p>";
        }

        ?>
    </div>
</div>