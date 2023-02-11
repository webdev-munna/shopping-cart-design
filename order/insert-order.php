<?php
session_start();
require_once("connect-db.php"); // connect database

$sessionId = $_POST['session_id'];
$token = $_POST['token'];
$subTotal = $_POST['sub_total'];
$itemDiscount = $_POST['item_discount'];
$tax = $_POST['tax'];
$shipping = $_POST['shipping'];
$total = $_POST['total'];
$discount = $_POST['discount'];
$grandTotal = $_POST['grand_total'];
$lastName = $_POST['last_name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$city = $_POST['city'];
$country = $_POST['country'];
$createdAt = date('Y-m-d H:i:s');
//insert query
$res = "INSERT INTO `order` (sessionId,token,status,subTotal,itemDiscount,tax,shipping,total,discount,grandTotal,lastName,mobile,email,city,country,createdAt)VALUES('$sessionId','$token','0','$subTotal','$itemDiscount','$tax','$shipping','$total','$discount','$grandTotal','$lastName','$mobile','$email','$city','$country','$createdAt')";
$result = mysqli_query($conn, $res);
$_SESSION['order_ins_succ'] = "Order inserted successfully";
header("location:add-order.php");
