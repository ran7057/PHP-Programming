<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!

$connect = mysqli_connect("localhost","rani","1234");
$db_con = mysqli_select_db( $connect, "ran_db");


$sql = "insert into tableboard_shop(date, order_id, name, price, quantity)
 values('$_POST[date]', '$_POST[order_id]', '$_POST[name]', '$_POST[price]', '$_POST[quantity]')";

$result = mysqli_query($connect, $sql);  // insert 성공하면 true. 실패하면 false

if(!$result) {
    echo "<script> alert('error'); </script>";  // java 함수
}

?>

<script>
    location.replace('../index.php');
</script>
