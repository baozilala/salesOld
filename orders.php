<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
<div class="container">
  <div class="row">
    <header class="title page-header text-center">
      <h1>All Order List</h1>
    </header>
    <div class="col-md-12 table-responsive">
      <?php $Order_List = mysql_query("SELECT * FROM orders LIMIT 20");?>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>ID:</th>
            <th><i class="fa fa-user"></i></th>
            <th>单号/<i class="fa fa-chrome"></i></th>
            <th><i class="fa fa-tags"></i></th>
            <th>价格/实价：</th>
            <th><i class="fa fa-calendar"></i></th>
            <th>数量：</th>
            <th><i class="fa fa-truck"></i></th>
            <th><i class="fa fa-plane"></i></th>
            <th><i class="fa fa-balance-scale"></i>、<i class="fa fa-money"></i></th>
            <th><i class="fa fa-cc-visa"></i>、<i class="fa fa-spinner"></i></th>
            <th><i class="fa fa-truck"></i></th>
            <th><i class="fa fa-gear"></i></th>
          </tr>
        </thead>

        <?php
          while($row = mysql_fetch_assoc($Order_List) ){
         ?>
          <tbody>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['Name'] ?></td>
              <td><?php echo "<a target='_blank' href='". $row['OrderSiteUrl'] . "'>".$row['OrderSite']." </a>"?><?php echo $row['OrderNumber'] ?></td>
              <td><?php echo $row['ProductName'] ?></td>
              <td><?php echo "$" . $row['Price'] ." 、 "?><?php echo "$" . $row['BuyingPrice'] ?></td>
              <td><?php echo $row['BuyingDate'] ?></td>
              <td><?php echo $row['Unit'] ?></td>
              <td><?php echo $row['ShipStatus'] ?></td>
              <td><?php echo $row['ShipChina'] ?></td>
              <td><?php echo $row['ShipWeight'] . "lb~"?><?php echo "$" . $row['ShipPrice'] ?></td>
              <td><?php echo $row['Bank'] . "、" ?><?php echo $row['BankStatus'] ?></td>
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
                  <ul class="list-inline">
                    <li><a href="edit.php?id=<?php echo $row['id'] ?>">E</a></li>
                    <li><a class="text-danger" href="#">D</a></li>
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
  </div>
</div>
<?php include "footer.php" ?>
