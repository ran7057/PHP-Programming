<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!

$connect = mysqli_connect("localhost","rani","1234");
$db_con = mysqli_select_db( $connect, "ran_db");

// $sql = "update tableboard_shop set date ='$_POST[date]', order_id='$_POST[order_id]', name='$_POST[name]', price='$_POST[price]', quantity='$_POST[quantity]' where num = '$_GET[num]' ";

$sql = "update tableboard_shop set date = '$_POST[date]' , order_id = '$_POST[order_id]', 
name= '$_POST[name]', price = '$_POST[price]', quantity = '$_POST[quantity]' where num = $_GET[num] ";

$result = mysqli_query($connect, $sql);



if(!$result) {
    echo "<script> alert('error'); </script>";  // java 함수
};


?>


<script>
    location.replace('../index.php');
</script>

