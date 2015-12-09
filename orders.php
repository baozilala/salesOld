<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
<header class="title page-header text-center">
  <h1>All Order List</h1>
</header>
<div class="col-md-12 table-responsive">
  <?php $Order_List = mysql_query("SELECT * FROM orders LIMIT 20");?>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>ID:</th>
        <th>姓名：</th>
        <th>订单号：</th>
        <th>订单网站：</th>
        <th>物品名称：</th>
        <th>价格：</th>
        <th>购入价格：</th>
        <th>购买日期：</th>
        <th>数量：</th>
        <th>商家发货：</th>
        <th>邮回中国：</th>
        <th>邮寄重量：</th>
        <th>邮寄价格：</th>
        <th>银行卡：</th>
        <th>银行状态：</th>
        <th>退货：</th>
        <th>Actions:</th>
      </tr>
    </thead>

    <?php
      while($row = mysql_fetch_assoc($Order_List) ){
     ?>

      <tbody>
        <tr>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['Name'] ?></td>
          <td><?php echo $row['OrderNumber'] ?></td>
          <td><?php echo "<a target='_blank' href='". $row['OrderSiteUrl'] . "'>".$row['OrderSite']."</a>" ?></td>
          <td><?php echo $row['ProductName'] ?></td>
          <td><?php echo "$" . $row['Price'] ?></td>
          <td><?php echo "$" . $row['BuyingPrice'] ?></td>
          <td><?php echo $row['BuyingDate'] ?></td>
          <td><?php echo $row['Unit'] ?></td>
          <td><?php echo $row['ShipStatus'] ?></td>
          <td><?php echo $row['ShipChina'] ?></td>
          <td><?php echo $row['ShipWeight'] . "&nbsplb"?></td>
          <td><?php echo "$" . $row['ShipPrice'] ?></td>
          <td><?php echo $row['Bank'] ?></td>
          <td><?php echo $row['BankStatus'] ?></td>

          <td>
            <?php
          if ($row['PackageReturn'] == 0 or $row['PackageReturn'] == 'null' ) {
            echo "不需退货";
          }elseif ($row['PackageReturn'] == 1) {
            echo "需要退货";
          }elseif ($row['PackageReturn'] == 2) {
            echo "<a href='http://www.google.com/?q=".$row['ReturnTracking']."' target='_blank'>查单</a>";
          }
          ?></td>

          <td>
              <ul class="list-unstyled">
                <li class="text-left"><a href="edit.php?id=<?php echo $row['id'] ?>">E</a></li>
                <li class="text-right"><a class="text-danger" href="#">D</a></li>
              </ul>
          </td>
        </tr>
      </tbody>
    <?php
  } ?>
    <tfoot>
    <?php
      /*统计订单数量*/
      $total_orders = mysql_query("SELECT * FROM orders");
      $need_return_orders = mysql_query("SELECT PackageReturn FROM Orders WHERE PackageReturn=0");
      $after_return_orders = mysql_query("SELECT PackageReturn FROM Orders WHERE PackageReturn=2");
      $total_orders = mysql_num_rows($total_orders);
      $need_return_orders = mysql_num_rows($need_return_orders);
      $after_return_orders = mysql_num_rows($after_return_orders);
      $returned = $total_orders-$need_return_orders;

      echo "<pre class='text-center'>"."总共".$total_orders . "单 &nbsp";
      echo "实际".$need_return_orders ."单&nbsp";
      echo $returned . "单需要退货&nbsp";
      echo "已退". $after_return_orders ."单&nbsp"."</pre>";
      mysql_close($con);
    ?>
    </tfoot>
  </table>
</div>
<?php include "footer.php" ?>
