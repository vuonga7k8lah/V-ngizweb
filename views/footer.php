<!--<div id="aside">-->
<!--    <h2>Welcome to izwebz</h2>-->
<!--    <p>-->
<!--        Please register to have fully access to our juicies information on the Internet.-->
<!--    </p>-->
<!--</div> <!--end aside-->
<?php use baitap\core\URL;?>
<div id="footer">
    <ul class="footer-links">
        <?php

        if(isset($_SESSION['user_level'])) {
            // Neu co SESSION
            switch($_SESSION['user_level']) {
                case 0: // Registered users access
                    echo "
                    <li><a href='".URL::uri('profile')."'>User Profile</a></li>
                    <li><a href='".URL::uri('forgot')."'>Change Password</a></li>
                    <li><a href=''>Personal Message</a></li>
                    <li><a href='".URL::uri('logout_home')."'>Log Out</a></li>
                ";
                    break;

                case 2: // Admin access
                    echo "
                    <li><a href='".URL::uri('profile')."'>User Profile</a></li>
                    <li><a href='".URL::uri('forgot')."'>Change Password</a></li>
                    <li><a href=''>Personal Message</a></li>
                    <li><a href='".URL::uri('admin')."'>Admin CP</a></li>
                    <li><a href='".URL::uri('logout_home')."'>Log Out</a></li>
                ";
                    break;

                default:
                    echo "
                    <li><a href='".URL::uri('register')."'>Register</a></li>
                    <li><a href='".URL::uri('login')."'>Login</a></li>
                ";
                    break;

            }

        } else {
            // Neu khong co $_SESSION
            echo "
                    <li><a href='".URL::uri('home')."'>Home</a></li>
                    <li><a href='".URL::uri('register')."'>Register</a></li>
                    <li><a href='".URL::uri('login')."'>Login</a></li>
                ";
        }
        ?>
    </ul>
</div><!--end footer-->
</div> <!-- end content-container-->
</div> <!--end container-->
</body>
</html>