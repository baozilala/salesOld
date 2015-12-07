<?php
include "header.php";
include "navigation.php";
include "connect.php";

$sql ="SELECT Name, SUM(Price) FROM orders GROUP BY Name";
$status = mysql_query($sql,$con) or die("价格计算出错:" . mysql_error());
?>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>姓名：</th>
      <th>共消费：</th>
    </tr>
  </thead>
<?php
  while ($row = mysql_fetch_assoc($status) ){
    ?>
    <tbody>
      <tr>
        <td> <?php echo $row['Name']; ?></td>
        <td> <?php echo $row['SUM(Price)']; ?></td>

      </tr>
    <tbody>
<?php
  }
 ?>
</table>
