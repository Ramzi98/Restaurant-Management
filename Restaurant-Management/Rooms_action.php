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
  $query = "SELECT * FROM room ";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
     <th class="text-center" style="width: 20%;"></th>
     <th class="text-center" style="width: 20%;">الحد الأدنى</th>
     <th class="text-center" style="width: 20%;">اسم الغرفة انجليزي</th>
     <th class="text-center" style="width: 20%;">اسم الغرفة عربي</th>
    </tr>
    </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
    
      $output .= '
    
    <tr>
    <td><input name="chk" type="checkbox" id="'.$row["id"].'"></td>
     <td>'.$row["name_a"].'</td>
     <td>'.$row["name_n"].'</</td>
     <td>'.$row["prix"].'</td>
    </tr>
   ';

   
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $name=$_POST["c"];
  $date=$_POST["e"];
  $price=$_POST["f"];
  

  $query = "INSERT INTO room(name_a,name_n,prix) VALUES ('$name','$date','$price')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {

  $name=$_POST["c"];
  $date=$_POST["e"];
  $price=$_POST["f"];
  $query = "UPDATE room SET name_a = '$name',name_n='$date',prix='$price' WHERE id = '".$_POST["id"]."'";
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
   
   $query = "DELETE FROM room WHERE id = '$value'";
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