<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
    <header class="title page-header text-center">
      <h1>订单修改</h1>
    </header>
<div class="col-md-12">
  <?php
  $Order_List = mysql_query("SELECT id, Name, OrderNumber, OrderSite, ProductName, Price, BuyingPrice, BuyingDate, Unit, ShipStatus, ShipChina, ShipWeight, ShipPrice, Bank, BankStatus, PackageReturn FROM orders WHERE id = $_GET[id]");
  ?>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>姓名：</th>
        <th>订单号：</th>
        <th>订单网站：</th>
        <th>物品名称：</th>
        <th>价格：</th>
        <th>购入价格：</th>
        <th>数量：</th>
        <th>商家发货：</th>
        <th>邮回中国：</th>
        <th>邮寄重量：</th>
        <th>邮寄价格：</th>
        <th>银行卡：</th>
        <th>银行状态：</th>
        <th>退货：</th>
      </tr>
    </thead>
    <form class="" action="order_update.php" method="post">
    <?php
      while($row = mysql_fetch_assoc($Order_List) ){
     ?>
      <tbody>
        <tr>
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <td><input type="text" name="Name" value="<?php echo $row['Name'] ?>"></td>
          <td><input type="text" name="OrderNumber" value="<?php echo $row['OrderNumber'] ?>"></td>
          <td><input type="text" name="OrderSite" value="<?php echo $row['OrderSite'] ?>"></td>
          <td><input type="text" name="ProductName" value="<?php echo $row['ProductName'] ?>"></td>
          <td><input type="number" name="Price" value="<?php echo $row['Price'] ?>"></td>
          <td><input type="text" name="BuyingPrice" value="<?php echo $row['BuyingPrice'] ?>"></td>
          <td><input type="text" name="Unit" value="<?php echo $row['Unit'] ?>"></td>
          <td><input type="text" name="ShipStatus" value="<?php echo $row['ShipStatus'] ?>"></td>
          <td><input type="text" name="ShipChina" value="<?php echo $row['ShipChina'] ?>"></td>
          <td><input type="text" name="ShipWeight" value="<?php echo $row['ShipWeight'] ?>"></td>
          <td><input type="text" name="ShipPrice" value="<?php echo $row['ShipPrice'] ?>"></td>
          <td><input type="text" name="Bank" value="<?php echo $row['Bank'] ?>"></td>
          <td><input type="text" name="BankStatus" value="<?php echo $row['BankStatus'] ?>"></td>
          <td>
            <?php
          if ($row['PackageReturn'] == 'null' ) {
            echo "
            <select class='form-control' name='PackageReturn'>
              <option value=''></option>
              <option value='0'>不需退货</option>
              <option value='1'>需要退货</option>
              <option value='2'>已经退货</option>
            </select>
            ";
          }elseif ($row['PackageReturn'] == 0) {
            echo "
            <select class='form-control' name='PackageReturn'>
              <option value='0'>不需退货</option>
              <option value=''></option>
              <option value='1'>需要退货</option>
              <option value='2'>已经退货</option>
            </select>
            ";
          }elseif ($row['PackageReturn'] == 1) {
            echo "
            <select class='form-control' name='PackageReturn'>
              <option value='1'>需要退货</option>
              <option value=''></option>
              <option value='0'>不需退货</option>
              <option value='2'>已经退货</option>
            </select>
            ";
          }elseif ($row['PackageReturn'] == 2) {
            echo "
            <select class='form-control' name='PackageReturn'>
              <option value='2'>已经退货</option>
              <option value=''></option>
              <option value='0'>不需退货</option>
              <option value='1'>需要退货</option>
            </select>
            ";
          }
          ?></td>
        </tr>
      </tbody>
    <?php
  } ?>
  <input type="submit" value="submit">
  </form>
  </table>
</div>

<?php include "footer.php" ?>
