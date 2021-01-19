<?php 
include('config/config.php');
$check=$conn->prepare("select * from booking where booking_con=? and booking_date=? and booking_time=?");
$check->execute(array($_POST['con'],$_POST['dateA'],$_POST['timeA']));
$num=$check->rowCount();

if($num>0)
{
    echo $_POST['conname']." is already booked. Please try other constultant";
}
else
{
    $conn->query("insert into booking set booking_con='".$_POST['con']."',booking_cus='".$_POST['cus']."',booking_date='".$_POST['dateA']."', booking_time='".$_POST['timeA']."'");
    echo '1';
}
