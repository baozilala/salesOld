<?php
include "header.php";
include "navigation.php";
include "connect.php";

$sql ="SELECT Name, SUM(Price) FROM orders GROUP BY Name";
$status = mysql_query($sql,$con) or die("价格计算出错:" . mysql_error());
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
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
    </div>
    <div class="col-md-6">
      <canvas id="sales" width="700" height="400"></canvas>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
