<!DOCTYPE html>
<html>
<head>
  <title></title>

</head>
<body>

</body>
</html>
<?php

$i=0;

if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 $query = "SELECT * FROM factures ORDER BY id DESC";
 if($_POST["action"] == "fetch")
 {
  
  if(isset($_POST["query"])&&($_POST["query"]!="")){
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM factures  WHERE id LIKE '%".$search."%'";
  }
    
  
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
                    <tr>
                        <th class="text-center" style="width: 12,5%;">تم &nbsp;الدفع</th>
                        <th class="text-center" style="width: 12,5%;">اشتراك</th>
                        <th class="text-center" style="width: 12,5%;">الجوال</th>
                        <th class="text-center" style="width: 12,5%;">تاريخ الفاتورة</th>
                        <th class="text-center" style="width: 12,5%;">الاجمالي</th>
                        <th class="text-center" style="width: 12,5%;">الاضافي</th>
                        <th class="text-center" style="width: 12,5%;">الخصم</th>
                        <th class="text-center" style="width: 12,5%;">مجموع الفاتورة</th>
                        <th class="text-center" style="width: 12,5%;">رقم الفاتورة</th>
                    </tr>
                </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
      $output .= '
    <tr>
    <td><input name="chk" type="checkbox" id="'.$row["id"].'"></td>
     <td>'.$row["numero_abonnement"].'</td>
     <td>'.$row["phone_num"].'</td>
     <td>'.$row["dates"].'</</td>
     <td>'.$row["total"].'</td>
     <td>'.$row["reduction"].'</td>
     <td>'.$row["montant"].'</td>
     <td>'.$row["id"].'</td>
     
    </tr>
   ';

   
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
     //phone
     $c=$_POST["c"];
     //date factures;
     $d = date("Y/m/d"); 
     echo $d;
     //total
     $e=$_POST["e"];
     //reduction
     $f=$_POST["f"];
     //total apres reduction
     $g=$_POST["g"];
  
  $query = "SELECT numero_abonnement   FROM factures";
  $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
  { $i=$row["numero_abonnement"]+1;}
  $query = "INSERT INTO factures(phone_num,dates,montant,reduction,total,numero_abonnement) VALUES ('$c','$d','$e','$f','$g','$i')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
   echo $i;
  }

 }
 if($_POST["action"] == "update")
 {
  $name=$_POST["name"];
  $user=$_POST["user"];
  $phone=$_POST["phone"];
  $type=$_POST["type"];
  $pass=$_POST["password"];
  $query = "UPDATE factures SET id='$a',phone_num='$b',dates='$c',montant='$d',reduction='$e',total='$f',numero_abonnement='$g' WHERE id = '".$_POST["id"]."'";
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
   
   $query = "DELETE FROM factures WHERE id = '$value'";
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