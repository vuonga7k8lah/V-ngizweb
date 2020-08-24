<html>
<head>
    <title>Array</title>
</head>

<body>
<?php
//$myArray = array(2,3,7,8,34, 39, 56, 67,76);
//?>
<!--Count : --><?php //echo count($myArray); ?><!-- <br />-->
<!--Max : --><?php //echo max($myArray);?><!--<br />-->
<!--Min : --><?php //echo min($myArray);?><!--<br />-->
<!--Sort: --><?php //sort($myArray); echo "<pre>"; print_r($myArray); echo "</pre>"; ?>
<!--Reverse Sort: --><?php //rsort($myArray); echo "<pre>"; print_r($myArray); echo "</pre>"; ?>
<!--Implode: --><?php //echo implode('*', $myArray);?>
<!---->
<?php
//$myEmails = 'izwebz@yahoo.com, admin@yahoo.com, support@izwebz.com';
//$split = explode(',', $myEmails);
//echo "<pre>";
//print_r($split);
//echo "</pre>";
//
//$last = end($split);
//echo $last;
//?>
<?php
//$myArray = array('html', 'css', 'wordpress', 'jquery', 'php', 'javascript');
//
//$array = array('photoshop', 'illustrator',  'corelDraw', 'thinkpad');
//
//$rand = array_rand($myArray);
//
//$viet_hoa = array_map('ucfirst', $array);
//foreach ($viet_hoa as $hoa) {
//    echo "<li>{$hoa}</li>";
//}
//
////shuffle($myArray);
//if(in_array('csss', $myArray)) {
//    echo "yes, it is in array";
//}

//$merged = array_merge($myArray, $array);

//$myArray[]  = 'ajax';

//array_splice($myArray, 3, 1, 'oop');

//unset($myArray[5]);

//array_splice($myArray,3, 2);

//print_r($myArray[$rand]);
$thang = array(
    1 => "Tháng 1",
    2 => "Tháng 2",
    3 => "Tháng 3",
    4 => "Tháng 4",
    5 => "Tháng 5",
    6 => "Tháng 6",
    7 => "Tháng 7",
    8 => "Tháng 8",
    9 => "Tháng 9",
    10 => "Tháng 10",
    11 => "Tháng 11",
    12 => "Tháng 12"
);
$nam= range('1900','2500');
$ngay=range('1','31');
?>
<form action="test.php" style="width: 400px; margin: 20px auto;" method="post">
    <select name="ngay">
        <option>Chọn Ngày</option>
        <?php foreach ($ngay as $row){
            echo "<option value='".$row."'>".$row."</option>";
        } ?>"
    </select>
    <select name="thang" id="">
        <option>Chọn Tháng</option>
        <?php foreach ($thang as $row){
            echo "<option value='".$row."'>".$row."</option>";
        } ?>"
    </select>
    <select name="nam" id="">
        <option>Chọn Năm</option>
        <?php foreach ($nam as $row){
            echo "<option value='".$row."'>".$row."</option>";
        } ?>"
    </select>
    <br>
    <input type="submit" value="Gửi" style="float: right">
</form>
</body>
</html>