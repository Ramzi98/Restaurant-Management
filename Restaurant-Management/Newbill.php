<?php
      session_start();
      if($_SESSION['type'] !="user"&&$_SESSION['type'] !="admin")
         header('Location: home.php');

      $connect = mysqli_connect("localhost", "root", "", "tutorial");
      mysqli_set_charset($connect,"utf8");
      $price=0;
      $query = "SELECT prix FROM food,news where food.id=news.id";
      $result = mysqli_query($connect, $query);
       while($row = mysqli_fetch_array($result))
      {$price=$row[0]+$price;}
    $img;
    $name;
    $phone;
    $date=date("Y-m-d");
    $width=0;
    $height=0;
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
    <title>دفع فاتورة</title>
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
    <style type="text/css">
      #inner {
            width: 50%;
            margin: 0 auto;
            }
    </style>
</head>

<body style="background-color: #ffd69b;">
  <div id="1">
    <div class="border-secondary shadow" style="background-color: #b0deff;">
        <div class="container" style="height: 54px;">
            <div class="row">
                <div class="col-md-12 offset-lg-7" style="margin-left: 0px;padding: 0px;">
                    <nav class="navbar navbar-light navbar-expand d-inline-block float-right" style="padding: 0px;">
                        <div class="container-fluid"><a class="navbar-brand" href="#"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse"
                                id="navcol-1">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item" role="presentation"><a class="nav-link active text-center" href="#" style="padding-right: 30px;font-size: 17px;padding-top: 12px;">!<?php echo $_SESSION['uname'];?>مرحبا</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link active text-center border rounded border-primary shadow-lg" href="#" style="font-size: 23px;background-color: #fdc472;height: 54px;">نظام المطعم</a></li>
                                     <li class="nav-item" role="presentation"><a class="nav-link active border rounded border-primary shadow-lg" href="a.php" style="font-size: 23px;background-color:red;height: 54px;">خروج</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center"><label class="col-form-label border rounded border-secondary shadow" style="padding: 10px;font-size: 21px;margin: 1px;background-color: rgb(231,231,231);color: rgb(0,0,0);padding-top: 3px;padding-bottom: 3px;">فاتورة جديدة<br>NEW BILL<br></label></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row" style="background-color: #bcbcbc;margin: 4px;">
                <div class="col-md-12 col-lg-12 text-right" style="margin: 9px;"><input id="R" type="number" value="0"><label style="margin-top: 3px;margin-left: 3px;">: المتبقي</label><input id="P" type="number" value="0"><label style="margin-right: 3px;margin-left: 3px;">: المدفوع</label><input id="C" type="text"><label style="margin-right: 3px;margin-left: 3px;">: اسم العميل</label>
                    <input id="T"
                        type="tel"><label style="margin-right: 3px;margin-left: 3px;">: الجوال&nbsp;</label></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-8" style="background-color: #e9e9e9;margin-left:0;padding: 6px;">
                 <div id="image_0"></div>
                  <ul id="image_1" class="nav nav-tabs text-center border rounded border-info shadow justify-content-end" style="background-color: #6a6a6a;margin: 4px;"></ul>
                 <div id="image_2" ></div>
            </div>
            <div class="col-md-6 col-lg-4 text-center" style="background-color: #e9e9e9;margin-left: 0;margin-right: 0;"><label class="text-center border rounded" style="background-color: #f76c6c;">قائمة الانواع المختارة</label>
                <div id="image_3">
                    
                </div>
            </div>
            <div class="col">
                <div id="image_5"></div>
            </div>
        </div>
    </div>
    </div>
      <div class="col text-center"><button id="imp" class="btn btn-primary bg-info" type="button" style="width: 150px;height: 50px;margin: 20px;display: none;">طباعة الفاتورة</button></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </div>
  <!-------------------------------------->
  <div id="imageModal" class="modal fade col text-center " role="dialog" >
    <div class="modal-dialog" id="inner" style="
    width:1100px; height:100% ;margin-left: 5px;background-color: #ffd69b;">
    <div class="modal-content" style="
    width:1100px; height:100% ;margin-left: 5px;background-color: #ffd69b;" id="inner" "  style="background-color: #ffd69b;">
    <div class="modal-header"  id="inner" " id="inner"  style="background-color: #ffd69b;">
    <!-------------------->
    </div>
          <div class="col text-center"><button id="printPageButton" class="btn btn-success" type="button" style="margin: 10px;padding-right: 15px;padding-left: 15px;font-family: Changa, sans-serif;" onClick="window.print();">طباعة</button></div>
   <!------------------------------>
     <div class="col text-center"><?php
                            echo '<img style="margin: 5px;border-color: blue;" src="data:image/jpeg;base64,'.base64_encode($img ).'"  class="img-thumbnail" height='.$height.' width='. $width.' />';?></div>
<!-------------------------->
     <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">الموقع مكة المكرمة</label></div>
     <!--phone-->
     <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">الهاتف:<?php echo $phone;?></label></div>
     <!--date-->
          <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">التاريخ:<?php echo $date;?><br></label></div><br>     <!-- user-->
     <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">مدخل الفاتورة:<?php echo $_SESSION['uname'];?><br></label></div></br>
    <div class="col text-center">
        <div class="table-borderless">
         
        </div>
    </div>
     <div id="image_7"></div>
    
    <div class="col text-center"><label class="col-form-label" style="font-family: Changa, sans-serif;font-size: 22px;">شكرا لزيارتكم<br>Thank you for your visit<br></label></div>
    <div class="col text-center"><button id="printPageButton" class="btn btn-danger" type="button"style="margin: 10px;margin-bottom:20px">إغلاق<i class="fa fa-close" style="margin: 5px;"></i></button></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</div></div></div></div>

                
         
  
</body>

<!--partie code javascript---->
<script type="text/javascript">
$(document).ready(function(){
  //$("#image_6").hide() 
  $("#1").show()   
  $("#imp").click(function(){
    //$('#imageModal').modal('show');
    //$('#image_form')[0].reset();
    //$('.modal-title').text("Add Image");
 
   var A=$(".all").val()
   var R=$("#s").val()
   var M=$(".M").val()
   var S=$("#R").val()
   var P=$("#P").val()
   var C=$("#C").val()
   var T=$("#T").val()
   var G=$("#G").val()
   $.ajax({
     url:"2.php",
     method:"POST",
     data:{action:"fetch",A:A,R:R,M:M,P:P,C:C,T:T,S:S,G:G},
     success:function(data)
     {
     //window.location.href = "print_facture.php";  
     
    }
  })  
   
   $.ajax({

     url:"print_facture.php",
     method:"POST",
     data:{action:"fetch",A:A,R:R,M:M,P:P,C:C,T:T,S:S,G:G},
     success:function(data)
     {
     window.location.href = "print_facture.php"; 
    }
  })     
});
  fetch_data5();

 function fetch_data5()
 { 
 
  var action = "fetch";
  $.ajax({
   url:"3.php",
   method:"POST",
   data:{},
   success:function(data)
   {
    $('#image_5').html(data);
   }
  })
 }

 fetch_data();

 function fetch_data()
 { 
 
  var action = "fetch";
  $.ajax({
   url:"Newbill_action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_1').html(data);
   }
  })
 }




 
});  
</script>
<script type="text/javascript">
$(document).on('keyup', '#s', function(){
  
  var all=$(".M").val()
  var S=$("#s").val()
 
  var t=all-S

  $(".all").val(t)



});
</script>
<script type="text/javascript">
$(document).on('keyup', '#G', function(){
  
  var all=$(".M").val()
  var G=$("#G").val()
  var S=$("#s").val()
  
  t=(parseFloat(G)+parseFloat(all))-parseFloat(S);

  $(".all").val(t)



});
</script>
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
    $('#image_7').html(data);
    //window.print();

   }
  })
 }


});  
</script>
<script type="text/javascript">
$(document).on('keyup', '#P', function(){
  
  var all=$(".M").val()
  var S=$("#P").val()
 
  var t=all-S

  $("#R").val(t)



});
</script>
</html>