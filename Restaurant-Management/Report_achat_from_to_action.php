
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>
<?php


 $connect = mysqli_connect("localhost", "root", "", "tutorial");
if(isset($_POST["action"]))
{
   

   $query = "SELECT * FROM achat ORDER BY id DESC";
      $d=date("Y-m-d");
      $c=date_create($d);
      date_add($c,date_interval_create_from_date_string("30 days"));
      $v= date_format($c,"Y-m-d");
  if(isset($_POST["Month"]))
    {
      

      $query ="SELECT * FROM achat where data between '$d' and'$v'";
    }
 if(isset($_POST["query1"])&&isset($_POST["query2"]))
   { 
    $d=$_POST["query1"];
    $v=$_POST["query2"];
    $query = "SELECT * FROM achat where data between '$d' and'$v'";
  }
   if(isset($_POST["strDate"]))
      {  
        $date=$_POST["strDate"];
        $query = "SELECT * FROM achat where data='$date' ";
      }
 
 if($_POST["action"] == "fetch")
 {

 $result = mysqli_query($connect, $query);
     
  
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead  style="background-color: #ffb648;">
                    <tr>
                        <th class="text-center" style="width: 12,5%;">التكلفة</th>
                        <th class="text-center" style="width: 12,5%;">التاريخ</th>
                        <th class="text-center" style="width: 12,5%;">اسم الوحدة</th>
                    </tr>
                </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
    
      $output .= '
    
    <tr> 
      <td>'.$row["price"].'</td>
      <td>'.$row["data"].'</td>
      <td>'.$row["name"].'</td>
     
     
  
     
    </tr>
   ';

   
  }
  $output .= '</table>';
  echo $output;
  $val=0;
      if((isset($_POST["query1"])&&isset($_POST["query2"])))
    
      { $total=0;
        $prix=0;
        $d=$_POST["query1"];
        $v=$_POST["query2"];
        $query = "SELECT count(*) FROM achat where data  between '$d' and'$v' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT price FROM achat where data  between '$d' and'$v' ";
         $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$prix=$row[0]+$prix;}
           echo '<table class="table table-bordered">
                <tbody class="text-right" style="background-color: #ffffff;">
                    <tr>
                     <td>'.$prix.'</td>
                      <td>المشتريات</td>
                    </tr>
                    <tr>
                      <td>'.$total.'</td>
                      <td>عدد المشتريات</td>
                    </tr>';
                    $val=1;
    }
     if(isset($_POST["Month"]))
    
      { $total=0;
        $prix=0;
        $query = "SELECT count(*) FROM achat where data  between '$d' and'$v' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT price FROM achat where data  between '$d' and'$v' ";
         $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$prix=$row[0]+$prix;}
           echo '<table class="table table-bordered">
                <tbody class="text-right" style="background-color: #ffffff;">
                    <tr>
                     <td>'.$prix.'</td>
                      <td>المشتريات</td>
                    </tr>
                    <tr>
                      <td>'.$total.'</td>
                      <td>عدد المشتريات</td>
                    </tr>';
    }
  if(isset($_POST["strDate"]))
    
      {  $total=0;
        $prix=0;
        $date=date("Y-m-d");
        $query = "SELECT count(*) FROM achat where data='$date' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT price FROM achat where data='$date' ";
         $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$prix=$row[0]+$prix;}
         echo "<table class='table table-bordered'>
                <tbody class='text-right' style='background-color: #ffffff;''>
                    <tr>
                        <td>".$total."</td>
                        <td>المشتريات</td>
                    </tr>
                    <tr class='text-right'>
                        <td>".$prix."</td>
                        <td>عدد المشتريات</td>
                    </tr>
                </tbody>
            </table>";
    }else if(!isset($_POST["strDate"]) && !isset($_POST["Month"])&& $val!=1)
      {  $total=0;
        $prix=0;
        $date=date("Y-m-d");
        $query = "SELECT count(*) FROM achat  ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT price FROM achat  ";
         $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$prix=$row[0]+$prix;}
         echo "<table class='table table-bordered'>
                <tbody class='text-right' style='background-color: #ffffff;''>
                    <tr>
                        <td>".$total."</td>
                        <td>المشتريات</td>
                    </tr>
                    <tr class='text-right'>
                        <td>".$prix."</td>
                        <td>عدد المشتريات</td>
                    </tr>
                </tbody>
            </table>";
    }
  

   
          
 }

 if($_POST["action"] == "insert")
 {
     //phone
     $c=$_POST["c"];
     //date factures;
     $d = date("Y/m/d"); 
    
     //total
     $e=$_POST["e"];
     //reduction
     $f=$_POST["f"];
     //total apres reduction
     $g=$_POST["g"];
  

  $query = "INSERT INTO factures(phone_num,dates,montant,reduction,total) VALUES ('$c','$d','$e','$f','$g')";
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
  
   
   $query = "DELETE FROM factures WHERE id = '$value'";
    if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
 }
}
?>