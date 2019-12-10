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
  $query = "SELECT * FROM type ORDER BY id DESC";
  $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($connect,$sSQL);
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
    <th class="text-center" style="width: 20%;"></th>
     <th class="text-center" style="width: 20%;">النوع الريئسي بالانجليزية</th>
     <th class="text-center" style="width: 20%;">النوع الرئيسي</th>
    </tr>
    </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
    
      $output .= '
    
    <tr>
    <td><input name="chk" type="checkbox" id="'.$row["id"].'"></td>
    <td>'.$row["name_an"].'</td>
    <td>'.$row["name_ar"].'</td>
     
    </tr>
   ';

   
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $name_ar=$_POST["name_ar"];
  $name_an=$_POST["name_an"];
  echo $name_ar;
  

  $query = "INSERT INTO type(name_ar,name_an) VALUES ('$name_ar','$name_an')";
  $sSQL= 'SET CHARACTER SET utf8'; 
  mysqli_query($connect,$sSQL);

  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
  $name_ar=$_POST["name_ar"];
  $name_an=$_POST["name_an"];
  $query = "UPDATE type SET name_ar = '$name_ar',name_an='$name_an' WHERE id = '".$_POST["id"]."'";
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
   
   $query = "DELETE FROM type WHERE id = '$value'";
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