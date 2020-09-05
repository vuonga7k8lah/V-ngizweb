<div id="navigation">
    <ul>
        <li><a href='<?=\baitap\core\URL::uri('home')?>'>Home</a></li>
        <li><a href='#'>About</a></li>
        <li><a href='<?php echo \baitap\core\URL::uri('logout')?>'>Services</a></li>
        <li><a href='<?php echo \baitap\core\URL::uri('contact')?>'>Contact us</a></li>
    </ul>

    <p class="greeting">Xin chào <?php echo (isset($_SESSION['name'])?$_SESSION['name']:"bạn hiền!");?></p>
</div><!-- end navigation-->