<div id="content-container">
    <div id="section-navigation">
        <ul class="navi">
<!--            <li><a href="#">Home</a>-->
<!--                <ul class="pages">-->
<!--                    <li><a href="#">Home</a></li>-->
<!--                    <li><a href="#">About</a></li>-->
<!--                    <li><a href="#">Clients</a></li>-->
<!--                    <li><a href="#">Contact Us</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <?php $data=\baitap\Model\CategoriesModel::selectallCategory();
            foreach ($data as $key=>$values):
            ?>
            <li><a href=""><?=$values[0]?></a></li>
            <?php endforeach; ?>
        </ul>
    </div><!--end section-navigation-->