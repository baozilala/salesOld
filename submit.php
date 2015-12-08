<?php
include "header.php";
include "navigation.php";
include "connect.php";

$sql="INSERT INTO
      orders (
        Name,
        OrderNumber,
        OrderSite,
        ProductName,
        Price,
        PackageReturn,
        BuyingPrice,
        BuyingDate,
        Unit,
        ShipStatus,
        ShipChina,
        ShipWeight,
        ShipPrice,
        Bank,
        BankStatus
      )
      VALUES(
        '$_POST[Name]',
        '$_POST[OrderNumber]',
        '$_POST[OrderSite]',
        '$_POST[ProductName]',
        '$_POST[Price]',
        '$_POST[PackageReturn]',
        '$_POST[BuyingPrice]',
        now(),
        '$_POST[Unit]',
        '$_POST[ShipStatus]',
        '$_POST[ShipChina]',
        '$_POST[ShipWeight]',
        '$_POST[ShipPrice]',
        '$_POST[Bank]',
        '$_POST[BankStatus]'
      )";

if (mysql_query($sql,$con)) {
  echo '插入数据库成功!';
}else{
  echo "插入数据库失败,失败原因：<br>".mysql_error();
}
mysql_close($con);

include "footer.php"
 ?>
