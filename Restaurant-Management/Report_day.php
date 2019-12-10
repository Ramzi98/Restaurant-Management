<?php
    session_start();
    if($_SESSION['type'] !="user"&&$_SESSION['type'] !="admin")
     header('Location: home.php'); 
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 $date=date("Y-m-d");
 $b=0;
 $c=0;
 $query = "SELECT sum(price) FROM achat where data='$date' ";
         $result = mysqli_query($connect, $query);
          while($row= mysqli_fetch_row($result)){$b=$row[0];}
 $query = "SELECT sum(total) FROM factures where dates='$date' ";
         $result = mysqli_query($connect, $query);
          while($row= mysqli_fetch_row($result)){$c=$row[0];}
      $b=$c-$b;
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>تقرير اليوم</title>
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
    <div class="col text-center"><label id="tarik" class="col-form-label text-center border rounded border-secondary shadow" style="padding: 15px;background-color: rgb(231,231,231);width: 150px;margin: 15px;"></label></div>
    <div class="col text-center" style="background-color: rgb(105,105,105);margin-top: 30px;margin-right: 0px;margin-left: 0px;margin-bottom: 20px;padding-right: 0px;padding-left: 0px;"><label class="col-form-label" style="font-size: 24px;color: rgb(255,255,255);">الانواع</label></div>
    <div class="col">
        <div class="table-responsive table-bordered" style="margin: 15px;margin-left: 3px;margin-right: 3px;">
            <div id="image_data"></div>
        </div>
    </div>
    <div class="col text-center" style="padding: 0px;background-color: rgb(105,105,105);margin-top: 30px;margin-right: 0px;margin-left: 0px;margin-bottom: 20px;"><label class="col-form-label" style="font-size: 24px;color: rgb(255,255,255);">قائمة الفواتير المدفوعة</label></div>
    <div class="col">
        <div class="table-responsive table-bordered" style="margin: 15px;margin-left: 3px;margin-right: 3px;">
            <div id="image_data1"></div>
        </div>
    </div>
    
    <div class="col text-center" style="padding: 0px;background-color: rgb(105,105,105);margin-top: 30px;margin-right: 0px;margin-left: 0px;margin-bottom: 20px;"><label class="col-form-label" style="font-size: 24px;color: rgb(255,255,255);">قائمة المشتريات</label></div>
    <div class="table-responsive table-bordered" style="margin: 15px;margin-left: 3px;margin-right: 3px;">
        <div id="image_data3"></div>
    </div>
    <div class="col text-center" style="padding: 0px;background-color: rgb(105,105,105);margin-top: 30px;margin-right: 0px;margin-left: 0px;margin-bottom: 20px;"><label class="col-form-label" style="font-size: 24px;color: rgb(255,255,255);">تحويلات بنكية</label></div>
    <div class="table-responsive table-bordered" style="margin: 15px;margin-left: 3px;margin-right: 3px;">
        <div id="image_data4"></div>
    </div>
    <div class="col">
        <div class="table-responsive table-bordered" style="margin: 15px;margin-left: 3px;margin-right: 3px;">
            <table class="table table-bordered">
                <tbody class="text-right" style="background-color: #ffffff;">
                    <tr class="text-right">
                        <td><?php echo $b; ?></td>
                        <td>حساب الفرق بين الدخل و المشتريات</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col text-center"><button id="printPageButton" class="btn btn-primary bg-info" type="button" style="width: 150px;height: 50px;margin: 20px;" onClick="window.print();">طباعة</button></div>
    <div class="col text-center"><button id="printPageButton" class="btn btn-primary bg-danger" type="button" style="width: 150px;height: 50px;margin-bottom: 10px;">إغلاق</button></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>
<script>
$(document).ready(function(){
    var d = new Date();
    var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
    $("#tarik").html(strDate)
  //type
  load_data();
  function load_data(query1,query2)
  {
    $.ajax({
      url:"Report_foods_from_to_action.php",
      method:"post",
      data:{query1:query1,action:"fetch",query2:query2,strDate:strDate},
      success:function(data)
      {
        $('#image_data').html(data);
      }
    });
  }
  ////facture
  load_data1();
  function load_data1(query1,query2)
  {
    $.ajax({
      url:"Report_all_factures_action.php",
      method:"post",
      data:{query1:query1,action:"fetch",query2:query2,strDate:strDate},
      success:function(data)
      {
        $('#image_data1').html(data);
      }
    });
  }
  //////////////achat
  load_data2();
  function load_data2(query1,query2)
  {
    $.ajax({
      url:"Report_achat_from_to_action.php",
      method:"post",
      data:{query1:query1,action:"fetch",query2:query2,strDate:strDate},
      success:function(data)
      {
        $('#image_data3').html(data);
      }
    });
  }
  ////////bank
    load_data3();
  function load_data3(query1,query2)
  {
    $.ajax({
      url:"Bank_transfert_action.php",
      method:"post",
      data:{query1:query1,action:"fetch",query2:query2,strDate:strDate},
      success:function(data)
      {
        $('#image_data4').html(data);
      }
    });
  }

   $('#print').click(function(){
    load_data($("#depart").val(),$("#arriver").val());
 });
});
</script>

</html>