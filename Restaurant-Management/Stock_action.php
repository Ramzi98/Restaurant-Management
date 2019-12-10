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
  $query = "SELECT * FROM stock ";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
     <th class="text-center" style="width: 20%;"></th>
     <th class="text-center" style="width: 20%;">الكمية</th>
     <th class="text-center" style="width: 20%;">الوحدة بالانجليزي</th>
     <th class="text-center" style="width: 20%;">الوحدة بالعربي</th>
    </tr>
    </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
    
      $output .= '
    
    <tr>
    <td><input name="chk" type="checkbox" id="'.$row["id"].'"></td>
     <td>'.$row["qt_ar"].'</td>
     <td>'.$row["qt_an"].'</</td>
     <td>'.$row["qt"].'</td>
    </tr>
   ';

   
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $name=$_POST["qt_ar"];
  $date=$_POST["qt_an"];
  $price=$_POST["qt"];
  

  $query = "INSERT INTO stock(qt_ar,qt_an,qt) VALUES ('$name','$date','$price')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {

   $name=$_POST["qt_ar"];
  $date=$_POST["qt_an"];
  $price=$_POST["qt"];
  $query = "UPDATE stock SET qt_ar = '$name',qt_an='$date',qt='$price' WHERE id = '".$_POST["id"]."'";
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
   
   $query = "DELETE FROM stock WHERE id = '$value'";
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