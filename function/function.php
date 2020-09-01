<?php
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
function captcha() {
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
