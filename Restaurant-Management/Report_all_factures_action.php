
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <head>
    <style type="text/css">

</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>تقرير الانواع للفاتورة من اي</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&amp;subset=arabic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aref+Ruqaa">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan&amp;subset=arabic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Changa">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

</head>
<body>

</body>
</html>
<?php



if(isset($_POST["action"]))
{ 

    
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
  $query =" 
          SELECT * FROM factures ORDER BY id DESC ";
    $d=date("Y-m-d");
     $c=date_create($d);
      date_add($c,date_interval_create_from_date_string("30 days"));
      $v= date_format($c,"Y-m-d");
 if(isset($_POST["Month"]))
    {
      $query =" 
           SELECT *
           FROM  factures
           WHERE  dates between '$d' and'$v'  ";
    }

 if((isset($_POST["query1"])&&isset($_POST["query2"])))
   {
    

    $d=$_POST["query1"];
    $v=$_POST["query2"];
     $query =" 
          SELECT *
          FROM  factures
          WHERE  dates between '$d' and'$v'";
    //$query = "SELECT * FROM achat where data between '$d' and'$v'";
        }
    if(isset($_POST["strDate"]))
      { $date=$_POST["strDate"];
        $query = "SELECT *
          FROM  factures
          WHERE  dates='$date' ";
      }
 if($_POST["action"] == "fetch")
 {
  
 
     
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead  style="background-color: #ffb648;">
                    <tr>
                        <th class="text-center" style="width: 12,5%;"></th>
                        <th class="text-center" style="width: 12,5%;">الاجمالي</th>
                        <th class="text-center" style="width: 12,5%;">رقم الفاتورة</th>
                    </tr>
                </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
    
      $output .= '
    
    <tr> 
      <td></td> 
      <td>'.$row["total"].'</td> 
      <td>'.$row["id"].'</td>
     


      
      
     
     
  
     
    </tr>
   ';

   
  }
  $output .= '</table>';
  echo $output;
  //bollean
  $val=0;
  $result =" SELECT count(*) FROM factures ORDER BY id DESC ";
  $result = mysqli_query($connect, $result);
  while($row = mysqli_fetch_array($result)){$count = $row[0];}
     if((isset($_POST["query1"])&&isset($_POST["query2"])))
    
      { $total=0;
        $prix=0;
        $d=$_POST["query1"];
        $v=$_POST["query2"];
        $query = "SELECT count(*) FROM factures where dates  between '$d' and'$v' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT total FROM factures where dates between '$d' and'$v' ";
         $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$prix=$row[0]+$prix;}
           echo '<table class="table table-bordered">
                <tbody class="text-right" style="background-color: #ffffff;">
                    <tr>
                     <td>'.$prix.'</td>
                      <td>الاجمالي</td>
                    </tr>
                    <tr>
                      <td>'.$total.'</td>
                      <td>عدد الفواتير</td>
                    </tr>
';
        $val=1;
    }
     if(isset($_POST["Month"]))
    
      { $total=0;
        $prix=0;
        $date=date("Y-m-d");
        $query = "SELECT count(*) FROM factures where dates  between '$d' and'$v' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT total FROM factures where dates between '$d' and'$v' ";
         $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$prix=$row[0]+$prix;}
           echo '<table class="table table-bordered">
                <tbody class="text-right" style="background-color: #ffffff;">
                    <tr>
                     <td>'.$prix.'</td>
                      <td>تحويلات بنكية</td>
                    </tr>
                    <tr>
                      <td>'.$total.'</td>
                      <td> عدد التحويلات البنكية</td>
                    </tr>
';
    }
  if(isset($_POST["strDate"]))
    
      { $total=0;
        $prix=0;
        $date=date("Y-m-d");
        $query = "SELECT count(*) FROM factures where dates='$date' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT total FROM factures where dates='$date' ";
         $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$prix=$row[0]+$prix;}
           echo '<table class="table table-bordered">
                <tbody class="text-right" style="background-color: #ffffff;">
                    <tr>
                     <td>'.$prix.'</td>
                      <td>الاجمالي</td>
                    </tr>
                    <tr>
                      <td>'.$total.'</td>
                      <td>عدد الفواتير</td>
                    </tr>
';
    }else if(!isset($_POST["strDate"]) && !isset($_POST["Month"])&& $val!=1)
      {  $total=0;
        $prix=0;
        $date=date("Y-m-d");
        $query = "SELECT count(*) FROM factures  ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT total FROM factures  ";
         $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$prix=$row[0]+$prix;}
           echo '<table class="table table-bordered">
                <tbody class="text-right" style="background-color: #ffffff;">
                    <tr>
                     <td>'.$prix.'</td>
                      <td>الاجمالي</td>
                    </tr>
                    <tr>
                      <td>'.$total.'</td>
                      <td>عدد الفواتير</td>
                    </tr>
';
    }

                   
                echo'</tbody>
            </table>';
 
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