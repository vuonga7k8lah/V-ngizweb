<div id="content-container">
    <div id="section-navigation">
        <ul class="navi">
            <?php use baitap\Model\CategoriesModel;

            $data = CategoriesModel::selectallCategory();
            foreach ($data as $key => $values):
                ?>
                <li><a href=""><?= $values[0] ?></a>
                    <?php
                    $x = CategoriesModel::queryMenuPages($values[1]);
                    if ($x[0] > 0) {
                        foreach ($x[1] as $item => $name) {
                            echo "<ul class='pages'><li><a href=''>" . $name[0] . "</a></li></ul>";
                        }
                    } ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div><!--end section-navigation-->