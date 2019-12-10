<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">

</style>
</head>
<body>

</body>
</html>
<?php
//action.php


if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM customer ";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
    <th class="text-center" style="width: 5%;"></th>
     <th class="text-center" style="width: 20%;">المبلغ المتبقي</th>
     <th class="text-center" style="width: 20%;">المبلغ المدفوع</th>
     <th class="text-center" style="width: 20%;">الجوال</th>
     <th class="text-center" style="width: 20% ;">اسم العميل</th>
    </tr>
    </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
    
      $output .= '
    
    <tr>
    <td><input name="chk" type="checkbox" id="'.$row["id"].'"></td>
     <td>'.$row["R"].'</td>
     <td>'.$row["P"].'</td>
     <td>'.$row["phone_num"].'</td>
     <td>'.$row["name"].'</td>
    </tr>
   ';

   
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $name=$_POST["name"];
  $phone=$_POST["phone"];
  $p=$_POST["p"];
  $t=$_POST["t"];
  

  $query = "INSERT INTO customer(name,phone_num,P,R) VALUES ('$name','$phone','$p','$t')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {

 $name=$_POST["name"];
  $phone=$_POST["phone"];
  $type=$_POST["type"];
  echo $_POST["id"];
  $query = "UPDATE customer SET name = '$name',phone_num='$phone',type='$type' WHERE id = '".$_POST["id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Updated into Database';
  }
  else{
    echo 'nope';
  }
 }
 if($_POST["action"] == "delete")
 {
  $src1= $_POST['source1'];
  $array = explode(",", $src1);
  print_r($array);
 foreach ($array as $value){  
  echo $value;
   
   $query = "DELETE FROM customer WHERE id = '$value'";
    if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
  
 
  //$query = "UPDATE tbl_images SET id = id-1 WHERE id>'".$_POST["image_id"]."' ";
  //mysqli_query($connect, $query);
 }
}
?>