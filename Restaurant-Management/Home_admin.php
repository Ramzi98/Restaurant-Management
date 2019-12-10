<?php
  session_start();
  if($_SESSION['type'] !="admin")
     header('Location: home.php'); 
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>واجهة الادمين</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #ffd69b;">
    <div class="text-break border-secondary shadow" style="background-color: #b0deff;height: 54px;">
        <div class="container" style="padding: 0;">
            <div class="row" style="background-color: rgba(247,108,108,0);">
                <div class="col-md-12 offset-lg-7" style="margin-left: 0px;">
                    <nav class="navbar navbar-light navbar-expand d-inline-block float-right" style="padding: 0px;">
                        <div class="container-fluid"><a class="navbar-brand" href="#"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse"
                                id="navcol-1">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="padding-top: 12px;padding-right: 30px;font-size: 17px;">! <?php echo $_SESSION['uname'];?> مرحبا </a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link active border rounded border-primary shadow-lg" href="#" style="font-size: 23px;background-color: #fdc472;padding-bottom: 10px;">نظام المطعم</a></li>
                                     <li class="nav-item" role="presentation"><a class="nav-link active border rounded border-primary shadow-lg" href="a.php" style="font-size: 23px;background-color:red;height: 54px;">خروج</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div style="margin: 20px;padding-top: -1;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/bill.png" style="width: 150px;"><button id="1" class="btn btn-primary btn-block" type="button">الفواتير</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/bill%20(1).png" style="width: 150px;"><button id="2" class="btn btn-primary btn-block" type="button">فاتورة جديدة / دفع فاتورة</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/goods.png" style="width: 150px;"><button id="3" class="btn btn-primary btn-block" type="button">المشتريات</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/specialist-user.png" style="width: 150px;"><button id="4" class="btn btn-primary btn-block" type="button">العملاء</button></div>
            </div>
        </div>
    </div>
    <div style="margin: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/customer-service.png" style="width: 150px;"><button id="5" class="btn btn-primary btn-block" type="button">المستخدم</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/barbecue.png" style="width: 150px;"><button id="6" class="btn btn-primary btn-block" type="button">الانواع الرئيسية</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/lunch-box.png" style="width: 150px;"><button id="7" class="btn btn-primary btn-block" type="button">الطعام</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/warehouse.png" style="width: 150px;"><button id="8" class="btn btn-primary btn-block" type="button">إدارة المخزون</button></div>
            </div>
        </div>
    </div>
    <div style="margin: 20px;"></div>
    <div style="margin: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/report.png" style="width: 150px;"><button id="9" class="btn btn-primary btn-block" type="button">التقارير</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/visa.png" style="width: 150px;"><button id="10" class="btn btn-primary btn-block" type="button">تحويلات بنكية</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/store.png" style="width: 150px;"><button id="11" class="btn btn-primary btn-block" type="button">الغرف</button></div>
                <div class="col-md-3 text-center" data-bs-hover-animate="pulse"><img src="assets/img/settings.png" style="width: 150px;"><button id="12" class="btn btn-primary btn-block" type="button">إعدادات المطعم</button></div>
            </div>
        </div>
    </div>
    <div style="margin: 20px;"></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>
<script type="text/javascript">
$(document).ready(function(){
    
  $("button").click(function(){
    var i=this.id;
   if (i==1) {document.location.href="Factures.php";}
   if (i==2) {document.location.href="Newbill.php";}
   if (i==3) {document.location.href="Achat.php";}
   if (i==4) {document.location.href="Clients.php";}
   if (i==5) {document.location.href="Users.php";}
   if (i==6) {document.location.href="Types_food.php";}
   if (i==7) {document.location.href="Foods.php";}
   if (i==8) {document.location.href="stock.php";}
   if (i==9) {document.location.href="Reports.php";}
   if (i==10) {document.location.href="Bank_transfert.php";}
   if (i==11) {document.location.href="Rooms.php";}
   if (i==12) {document.location.href="Parameter.php";}
   
});
 
});
</script>

</html>