<?php

use baitap\core\Redirect;
use \baitap\Model\PagesViewModel;

// Cat chu~ de hien thi thanh doan van ngan.
function the_excerpt($text, $string = 400)
{
    $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
    if (strlen($sanitized) > $string) {
        $cutString = substr($sanitized, 0, $string);
        $words = substr($sanitized, 0, strrpos($cutString, ' '));
        return $words;
    } else {
        return $sanitized;
    }

}

function captcha()
{
    $qna = array(
        1 => array('question' => 'Một Cộng Một', 'answer' => 2),
        2 => array('question' => 'Ba Trừ Hai', 'answer' => 1),
        3 => array('question' => '3 Nhân 5', 'answer' => 15),
        4 => array('question' => '6 chia 2', 'answer' => 3),
        5 => array('question' => 'Nàng Bạch Tuyết Và .... Chú Lùn', 'answer' => 7),
        6 => array('question' => 'Alibaba Và ... Tên Cướp', 'answer' => 40),
        7 => array('question' => 'Ăn 1 Quả Khế, Trả .... Cục vàng', 'answer' => 1),
        8 => array('question' => 'May Túi .... Gang, Mang Đi Mà Đựng', 'answer' => 3)
    );
    $rand_key = array_rand($qna); // Lay ngau nhien mot trong cac array 1, 2, 4
    $_SESSION['q'] = $qna[$rand_key];
    return $question = $qna[$rand_key]['question'];
} // END function captcha
function clean_email($value)
{
    $suspects = array('to:', 'bcc:', 'cc:', 'content-type:', 'mime-version:', 'multipart-mixed:', 'content-transfer-encoding:');
    foreach ($suspects as $s) {
        if (strpos($value, $s) !== FALSE) {
            return '';
        }
        // Tra ve gia tri cho dau xuong hang
        $value = str_replace(array('\n', '\r', '%0a', '%0d'), '', $value);
        return trim($value);
    }
}

function isAdmin()
{
    return isset($_SESSION['user_level']) && ($_SESSION['user_level'] == 2);
}

function isLogin()
{
    if (isset($_SESSION['user_level'])){
        return true;
    }
    else{
        Redirect::uri('login');
    }
}

function isLoginAdmin()
{
    if (isAdmin()) {
        return true;
    } else Redirect::uri('login');
}

function view_counter($pg_id)
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (PagesViewModel::isSelectPagesView($pg_id)[0] > 0) {

        // Neu ket qua tra ve, co nghia la da ton tai trong table, Update page view
        $num_views = PagesViewModel::isSelectPagesView($pg_id)[1]['num_view'];
        $db_ip = PagesViewModel::isSelectPagesView($pg_id)[1]['user_ip'];

        // So sanh IP trong CSDL va IP cua nguoi dung, neu khac nhau thi se update CSDL
        if ($db_ip !== $ip) {
            PagesViewModel::updatePagesView($pg_id);
        }

    } else {
        // Neu ko co ket qua tra ve, thi se insert vao table.
        PagesViewModel::insertData($pg_id, $ip);
        $num_views = 1;
    }
    return $num_views;
}// ENd view_counter

// Ham nay de thong bao loi
function report_error($mgs) {
    if(isset($mgs)) {
        foreach ($mgs as $m) {
            echo $m;
        }
    }
} // END report_error