<div id="content-container">
    <div id="section-navigation">
        <ul class="navi">
            <?php use baitap\core\URL;
            use baitap\Model\CategoriesModel;

            $data = CategoriesModel::selectallCategory();
            foreach ($data as $key => $values):
                ?>
                <li><a href="<?php echo URL::uri('cid') . '/' . $values[1] ?>"><?= $values[0] ?></a>
                    <?php
                    $x = CategoriesModel::queryMenuPages($values[1]);
                    if ($x[0] > 0) {
                        foreach ($x[1] as $item => $name):
                            ?>
                            <ul class='pages'>
                                <li><a href="<?php echo URL::uri('paid').'/'.$name[1]?>"><?=$name[0]?></a></li>
                            </ul>
                            <?php
                       endforeach;
                    } ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div><!--end section-navigation-->