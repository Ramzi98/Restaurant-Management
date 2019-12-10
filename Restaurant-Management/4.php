<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>
<?php
      echo "string";
      $connect = mysqli_connect("localhost", "root", "", "tutorial");
      mysqli_set_charset($connect,"utf8");
      $price=0;
      $query = "INSERT INTO  new1(id) VALUES ('".$_POST["id"]."')";
          if(mysqli_query($connect, $query))  {echo "inserted";}
      $query = "SELECT food.prix FROM food,news where food.id=news.id";
      $result = mysqli_query($connect, $query);
       while($row = mysqli_fetch_array($result))
      {$price=$row[0]+$price;}

      echo $price;
      echo "<div class='text-right' style='margin: 15px;background-color: #bcbcbc;margin-bottom: 25px;padding: 5px;'><input class='all' type='text' value='$price' style='width: 15%;''><label style=' margin: 5px;font-size: 16px;'>&nbsp;: الإجمالي</label><input  type='number' value='' style='width: 15%;'><label style='margin: 5px;font-size: 16px;'>&nbsp;: إضافي</label>
                    <input id='s'
                        type='number' value='0' style='width: 15%;'><label style='margin: 5px;font-size: 16px;'>&nbsp;: الخصم</label><input class='M' type='number' value='$price' style='width: 15%;'><label style='font-size: 16px;margin: 5px;'>: مجموع الفاتورة</label></div>";

 ?>
