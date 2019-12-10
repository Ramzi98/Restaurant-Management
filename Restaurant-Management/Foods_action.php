<?php
//action.php


if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 mysqli_set_charset($connect,"utf8");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM food ORDER BY id DESC";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
    <th class="text-center" style="width: 20%;"></th>
     <th class="text-center" style="width: 20%;">النوع</th>
     <th class="text-center" style="width: 20%;">اسم الانجليزي</th>
     <th class="text-center" style="width: 20%;">الاسم بالعربي</th>
     <th class="text-center" style="width: 20% ;">السعر</th>
    </tr>
    </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
    
      $output .= '
    
    <tr>
    <td><input name="chk" type="checkbox" id="'.$row["id"].'"></td>
     <td>'.$row["name_ar"].'</td>
     <td>'.$row["name_an"].'</</td>
     <td>'.$row["type"].'</td>
      <td>'.$row["prix"].'</td>
     
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
  $prix=$_POST["price"];
  $type=$_POST["type"];
  $image=$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  echo '<img src="data:image/jpeg;base64,'.base64_encode($image ).'" height="60" width="75" class="img-thumbnail" />';

  $query = "INSERT INTO food(name_ar,name_an,type,prix,image) VALUES ('$name_ar','$name_an','$type','$prix','$image')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
   $date=date("Y-m-d");
   $query = "INSERT INTO food1(name_ar,name_an,type,prix,image,data) VALUES ('$name_ar','$name_an','$type','$prix','$image','$date')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
  $name_ar=$_POST["name_ar"];
  $name_an=$_POST["name_an"];
  $prix=$_POST["price"];
  $type=$_POST["type"];
  $image= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE food SET name_ar = '$name_ar',name_an='$name_an',type='$type',prix='$prix',type='$type',image='$image' WHERE id = '".$_POST["id"]."'";
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
   
   $query = "DELETE FROM food WHERE id = '$value'";
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