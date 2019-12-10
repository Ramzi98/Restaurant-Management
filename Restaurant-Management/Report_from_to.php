<?php
    session_start();
    if($_SESSION['type'] !="user"&&$_SESSION['type'] !="admin")
     header('Location: home.php'); 
 ?>
<!DOCTYPE html>
<html>
<?php
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 $d=date("Y-m-d");
 $c=date_create($d);
 date_add($c,date_interval_create_from_date_string("30 days"));
 $v= date_format($c,"Y-m-d");
 $b=0;
 $c=0;
 $query = "SELECT sum(price) FROM achat where data between '$d' and '$v' ";
         $result = mysqli_query($connect, $query);
          while($row= mysqli_fetch_row($result)){$b=$row[0];}
 $query = "SELECT sum(total) FROM factures where dates between '$d' and '$v'  ";
         $result = mysqli_query($connect, $query);
          while($row= mysqli_fetch_row($result)){$c=$row[0];}
      $b=$c-$b;
 ?>
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
     <div class="col text-center"><input id="arriver" type="date" style="height: 30px;margin: 10px;width: 160px;"><label class="text-center border rounded shadow" style="margin: 10px;font-size: 23px;background-color: #ffb648;width: 50px;">الى</label><input id="depart" type="date" style="width: 160px;margin: 10px;height: 30px;">
        <label class="text-center border rounded shadow" style="margin: 10px;font-size: 23px;background-color: #ffb648;width: 50px;">من</label>
    </div>
    <div class="col text-center" style="font-size: 16px;"><button id="print" class="btn btn-outline-primary" type="button" style="font-size: 22px;width: 160px;height: 50px;margin-right: 3px;background-color: rgb(255,182,72);margin-top: 15px;">عرض التقرير</button></div>
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
                        <td ><div id="chouf"></div></td>
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
  //type
  function load_data7(query1,query2)
  {
    $.ajax({
      url:"t.php",
      method:"post",
      data:{query1:query1,action:"fetch",query2:query2},
      success:function(data)
      {
        $('#chouf').html(data);
      }
    });
  }
  load_data();
  function load_data(query1,query2)
  {
    $.ajax({
      url:"Report_foods_from_to_action.php",
      method:"post",
      data:{query1:query1,action:"fetch",query2:query2},
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
      data:{query1:query1,action:"fetch",query2:query2},
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
      data:{query1:query1,action:"fetch",query2:query2},
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
      data:{query1:query1,action:"fetch",query2:query2},
      success:function(data)
      {
        $('#image_data4').html(data);
      }
    });
  }

   $('#print').click(function(){
    load_data($("#depart").val(),$("#arriver").val());
    load_data1($("#depart").val(),$("#arriver").val());
    load_data2($("#depart").val(),$("#arriver").val());
    load_data($("#depart").val(),$("#arriver").val());
    load_data7($("#depart").val(),$("#arriver").val());
 });
});
</script>

</html>