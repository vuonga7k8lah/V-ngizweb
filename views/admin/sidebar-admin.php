<?php use baitap\core\URL; ?>
<div id="content-container">
    <div id="section-navigation">
        <ul class="navi">
            <li><a href="<?php echo URL::uri('list_categories') ?>">Categories</a>
                <ul class="pages">
                    <li><a href="<?php echo URL::uri('list_categories') ?>">list Categories</a></li>
                    <li><a href="<?php echo URL::uri('add_categories') ?>">add Categories</a></li>
                </ul>
            </li>
            <li><a href="<?php echo URL::uri('list_pages') ?>">Pages</a>
                <ul class="pages">
                    <li><a href="<?php echo URL::uri('list_Pages') ?>">list Pages</a></li>
                    <li><a href="<?php echo URL::uri('add_Pages') ?>">add Pages</a></li>
                </ul>
            </li>
        </ul>
    </div>