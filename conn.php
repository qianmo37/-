<?php
  $conn = mysqli_connect("localhost", "root", "");
 
  if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
  }
  mysqli_query($conn , "set names utf8");
  mysqli_select_db( $conn, 'messageboard');	//选择messageboard数据库
?>