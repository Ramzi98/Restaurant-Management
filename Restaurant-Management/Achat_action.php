<!DOCTYPE html>
<html>
<head>
  <title></title>
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
    $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($connect,$sSQL);
  $query = "SELECT * FROM achat ";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
     <th class="text-center" style="width: 20%;"></th>
     <th class="text-center" style="width: 20%;">التكلفة</th>
     <th class="text-center" style="width: 20%;">التاريخ</th>
     <th class="text-center" style="width: 20%;">اسم الوحدة&nbsp;</th>
    </tr>
    </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
    
      $output .= '
    
    <tr>
    <td><input name="chk" type="checkbox" id="'.$row["id"].'"></td>
    
     <td>'.$row["name"].'</td>
     <td>'.$row["data"].'</</td>
     <td>'.$row["price"].'</td>
    </tr>
   ';

   
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $name=$_POST["name"];
  $date=$_POST["date"];
  $price=$_POST["price"];
  
    $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($connect,$sSQL);
  $query = "INSERT INTO achat(name,data,price) VALUES ('$name','$date','$price')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {

 $name=$_POST["name"];
  $date=$_POST["date"];
  $price=$_POST["price"];
  $query = "UPDATE achat SET name = '$name',data='$date',price='$price' WHERE id = '".$_POST["id"]."'";
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
   
   $query = "DELETE FROM achat WHERE id = '$value'";
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