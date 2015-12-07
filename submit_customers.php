<?php
include "header.php";
include "navigation.php";
include "connect.php";

$sql="INSERT INTO customers
      (
        Name,
        Alias,
        Phone,
        Address,
        Zip,
        Chineseid
      )
        VALUES(
          '$_POST[name]',
          '$_POST[alias]',
          '$_POST[phone]',
          '$_POST[address]',
          '$_POST[zip]',
          '$_POST[chineseid]'
        )";

      if (mysql_query($sql,$con)) {
        echo '插入数据库成功!';
      }else{
        echo "插入数据库失败,失败原因：<br>".mysql_error();
      }
      mysql_close($con);

      include "footer.php"
 ?>
