<?php
    session_start();
    if($_SESSION['type'] !="user"&&$_SESSION['type'] !="admin")
     header('Location: home.php'); 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <head>
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
          SELECT * FROM bank ORDER BY id DESC ";
           $d=date("Y-m-d");
           $c=date_create($d);
           date_add($c,date_interval_create_from_date_string("30 days"));
           $v= date_format($c,"Y-m-d");
if(isset($_POST["Month"]))
    {
      $query =" 
           SELECT *
          FROM  bank
          WHERE  dates between '$d' and'$v'";
    }
 if(isset($_POST["query1"])&&isset($_POST["query2"]))
   {
    $d=$_POST["query1"];
    $v=$_POST["query2"];
     $query =" 
          SELECT *
          FROM  bank
          WHERE  dates between '$d' and'$v'";
    
        }
    if(isset($_POST["strDate"]))
      { $date=$_POST["strDate"];
        $query = "SELECT *
          FROM   bank
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
                        <th></th>
                        <th class="text-center" style="width: 12,5%;">التاريخ</th>
                        <th class="text-center" style="width: 12,5%;">المبلغ</th>
                        <th class="text-center" style="width: 12,5%;">الوصف</th>
                    </tr>
                </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {            
    echo '<tbody class="text-right" style="background-color: #ffffff;">';
      $output .= '
    <tr> 
      <td><input name="chk" type="checkbox" id="'.$row["id"].'"></td>
      <td>'.$row["dates"].'</td> 
      <td>'.$row["prix"].'</td> 
      <td>'.$row["id"].'</td>
    </tr>
   ';

   
  }
  $output .= '</tbody></table>';
  echo $output;
  $val=0;
    if((isset($_POST["query1"])&&isset($_POST["query2"])))
    
      {  $val1=1;
        $total=0;
        $prix=0;
        $d=$_POST["query1"];
        $v=$_POST["query2"];
        $query = "SELECT count(*) FROM bank where dates  between '$d' and'$v' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT prix FROM bank where dates between '$d' and'$v' ";
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
  $val=1;
  $val1=0;
    }
   if(isset($_POST["Month"]))
      {
         $val1=1;
       $total=0;
        $prix=0;
        $date=date("Y-m-d");
        $query = "SELECT count(*) FROM bank where dates  between '$d' and'$v' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT prix FROM bank where dates between '$d' and'$v' ";
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
    
      {  $val1=1;
        $total=0;
        $prix=0;
        $date=date("Y-m-d");
        $query = "SELECT count(*) FROM bank where dates='$date' ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT prix FROM bank where dates='$date' ";
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
    }else if(!isset($_POST["strDate"]) && !isset($_POST["Month"])&& ($val!=1&&$val!=0))
      { $total=0;
        $prix=0;
        $date=date("Y-m-d");
        $query = "SELECT count(*) FROM bank  ";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {$total=$row[0];}
         $query = "SELECT prix FROM bank  ";
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

    }


                   
                echo'</tbody></table>';
 
 }

 if($_POST["action"] == "insert")
 {
     //phone
     $des=$_POST["des"];
     $prix=$_POST["prix"];
     //reduction
     $date=$_POST["date"];
   
  

  $query = "INSERT INTO bank(des,prix,dates) VALUES ('$des','$prix','$date')";
  if(mysqli_query($connect, $query))
  {
   echo "string";
  }
 }
 if($_POST["action"] == "update")
 {
     $des=$_POST["des"];
     $prix=$_POST["prix"];
     $date=$_POST["date"];
  $query = "UPDATE bank SET des='$des',prix='$prix',dates='$date' WHERE id = '".$_POST["id"]."'";
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
   $query = "DELETE FROM bank WHERE id = '$value'";
    if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
  
 
 }

?>