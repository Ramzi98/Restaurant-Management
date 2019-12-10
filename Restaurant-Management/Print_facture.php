<?php
    session_start();
    if($_SESSION['type'] !="user"&&$_SESSION['type'] !="admin")
     header('Location: home.php'); 
    $img;
    $name;
    $phone;
    $date=date("Y-m-d");
    $width=0;
    $height=0;
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 $query = "SELECT * FROM parameter ";
         $result = mysqli_query($connect, $query);
          while($row= mysqli_fetch_row($result)){
            $width=$row[6];
            $height=$row[7];
            $img=$row[11];
            $name=$row[1];
            $phone=$row[4];
          }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>طباعة فاتورة</title>
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

<body style="background-color: #ffd69b;">
    <div class="col text-center"><button id="printPageButton" class="btn btn-success" type="button" style="margin: 10px;padding-right: 15px;padding-left: 15px;font-family: Changa, sans-serif;" onClick="window.print();">طباعة</button></div>
    <div class="col text-center">
      <?php
      echo '<img style="margin: 5px;border-color: blue;" src="data:image/jpeg;base64,'.base64_encode($img ).'"  class="img-thumbnail" height='.$height.' width='. $width.' />';
       ?>
     </div>
     <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">الموقع مكة المكرمة</label></div>
     <!--phone-->
     <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">الهاتف:<?php echo $phone;?></label></div>
     <!--date-->
          <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">التاريخ:<?php echo $date;?><br></label></div>
     <!-- user-->
     <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">مدخل الفاتورة:<?php echo $_SESSION['uname'];?><br></label></div>
   
    <div id="image_data"></div>
    <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">شكرا لزيارتكم<br>Thank you for your visit<br></label></div>
    <div class="col text-center"><button id="printPageButton" class="btn btn-danger" type="button"style="margin: 10px;margin-bottom:20px">إغلاق<i class="fa fa-close" style="margin: 5px;"></i></button></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>
<script>  
$(document).ready(function(){
 fetch_data();
 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"Print_facture_action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
    //window.print();

   }
  })
 }


});  
</script>

</html>






