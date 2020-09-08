<?php


namespace baitap\Controller;


use baitap\core\Redirect;
use baitap\Model\UserModel;

class ProfileController
{
    public function profileView()
    {
        require_once 'views/icms/profile.php';
    }

    public function profileEdit()
    {
        if (isset($_FILES['image'])) {
            // Tao mot array trong cho bien errors
            $errors = array();

            // Tao mot array, de kiem tra xem file upload co thuoc dang cho phep
            $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'images/x-png');

            // Kiem tra xem file upload co nam trong dinh dang cho phep
            if (in_array(strtolower($_FILES['image']['type']), $allowed)) {
                // Neu co trong dinh dang cho phep, tach lay phan mo rong
                $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
                $renamed = uniqid(rand(), true) . '.' . "$ext";
                if (!move_uploaded_file($_FILES['image']['tmp_name'], "./assets/uploads/images/" . $renamed)) {
                    $errors[] = "<p class='error'>Server problem</p>";
                }
            } else {
                // FIle upload khong thuoc dinh dang cho phep
                $errors[] = "<p class='error'>Your file is not a valid type. Please choose a jpg or png image to upload.</p>";
            }
        } // END isset $_FILES
        if ($_FILES['image']['error'] > 0) {
            $errors[] = "<p class='error'>The file could not be uploaded because: <strong>";

            // Print the message based on the error
            switch ($_FILES['image']['error']) {
                case 1:
                    $errors[] .= "The file exceeds the upload_max_filesize setting in php.ini";
                    break;

                case 2:
                    $errors[] .= "The file exceeds the MAX_FILE_SIZE in HTML form";
                    break;

                case 3:
                    $errors[] .= "The was partially uploaded";
                    break;

                case 4:
                    $errors[] .= "NO file was uploaded";
                    break;

                case 6:
                    $errors[] .= "No temporary folder was available";
                    break;

                case 7:
                    $errors[] .= "Unable to write to the disk";
                    break;

                case 8:
                    $errors[] .= "File upload stopped";
                    break;

                default:
                    $errors[] .= "a system error has occured.";
                    break;
            } // END of switch

            $errors[] .= "</strong></p>";
        } // END of error IF

        // Xoa file da duoc upload va ton tai trong thu muc tam
        if (isset($_FILES['image']['tmp_name']) && is_file($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) {
            unlink($_FILES['image']['tmp_name']);
        }

        if (empty($errors)) {
            // Update cSDL
            UserModel::updateUser($renamed, $_SESSION['uid']);
            Redirect::uri('profile');
        }

        report_error($errors);
        if (!empty($message)) echo $message;

    }

    public function updateUser()
    {
        $data=$_POST;
        $data['user_id']=$_SESSION['uid'];
        UserModel::updateUserYourself($data);
        Redirect::uri('profile');
    }
}