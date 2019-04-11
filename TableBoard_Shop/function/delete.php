<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드 삭제하기!

$connect = mysqli_connect("localhost","rani","1234");
$db_con = mysqli_select_db($connect, "ran_db");

// 필드 num이 $num 값을 가지는 레코드 삭제
$sql = "delete from tableboard_shop where num = $_GET[num] ";

$result = mysqli_query($connect, $sql);

if(!$result) {
    echo "<script> alert('error'); </script>";  // java 함수
}

?>

<script>
    location.replace('../index.php');
</script>


