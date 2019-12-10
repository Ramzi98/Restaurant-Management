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
  $query = "SELECT * FROM users ";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
     <th class="text-center" style="width: 20%;"></th>
     <th class="text-center" style="width: 20%;">صلاحيات مدير النظام</th>
     <th class="text-center" style="width: 20%;">الجوال</th>
     <th class="text-center" style="width: 20%;">الاسم</th>
     <th class="text-center" style="width: 20% ;">كلمة المرور</th>
     <th class="text-center" style="width: 20%;">اسم المستخدم</th>
    </tr>
    </thead>
  ';
  $messg='';
  while($row = mysqli_fetch_array($result))
  {
     if($row["type"]==1)
      $messg='(YES) نعم';
     else
      $messg='(NO) لا';


      $output .= '
    
    <tr>
     <td><input name="chk" type="checkbox" id="'.$row["user_id"].'"></td>
     <td>'.$messg.'</td>
     <td>'.$row["phone"].'</td>
     <td>'.$row["first_name"].'</td>
     <td>'.$row["password"].'</td>
     <td>'.$row["email"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $name=$_POST["name"];
  $user=$_POST["user"];
  $phone=$_POST["phone"];
  $type=$_POST["type"];
echo $type;
  if($type=="لا")
    $type=0;
  else if($type=="نعم")
    $type=1;
  $pass=$_POST["password"];
  

  $query = "INSERT INTO users(first_name, phone, email, password,type) VALUES ('$name','$phone','$user','$pass','$type')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
  $name=$_POST["name"];
  $user=$_POST["user"];
  $phone=$_POST["phone"];
  $type=$_POST["type"];
  $pass=$_POST["password"];
  $query = "UPDATE users SET first_name = '$name',phone='$phone',email='$user',password='$pass',type='$type' WHERE user_id = '".$_POST["id"]."'";
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
   
   $query = "DELETE FROM users WHERE user_id = '$value'";
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