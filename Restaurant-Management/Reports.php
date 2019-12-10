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
    <title>التقارير</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #ffd69b;">
    <div class="border-secondary shadow" style="background-color: #b0deff;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 offset-lg-7" style="margin-left: 0;">
                    <nav class="navbar navbar-light navbar-expand d-inline-block float-right" style="padding: 0px;">
                        <div class="container-fluid"><a class="navbar-brand" href="#"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse d-inline-block float-left"
                                id="navcol-1">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="padding-top: 12px;padding-right: 30px;font-size: 17px;">!<?php echo $_SESSION['uname'];?>مرحبا </a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link active border rounded border-primary shadow-lg" href="#" style="font-size: 23px;background-color: #fdc472;">نظام المطعم</a></li>
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
                <div class="col-md-12 text-center"><label class="col-form-label border rounded border-secondary shadow" style="padding: 10px;font-size: 21px;margin: 1px;background-color: rgb(231,231,231);color: rgb(0,0,0);padding-top: 3px;padding-bottom: 3px;">التقارير<br>Reports<br></label></div>
            </div>
        </div>
    </div>
    <div style="margin: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center" data-bs-hover-animate="pulse"><img src="assets/img/clipboard.png" style="width: 150px;height: 150px;"><button class="btn btn-primary btn-block text-center" type="button" id="1">تقرير اليوم</button></div>
                <div class="col-md-4 text-center" data-bs-hover-animate="pulse"><img src="assets/img/newspaper.png" style="width: 150px;height: 150px;"><button class="btn btn-primary btn-block text-center" type="button" id="2">تقرير الشهر</button></div>
                <div class="col-md-4 text-center" data-bs-hover-animate="pulse"><img src="assets/img/report-1.png" style="width: 150px;height: 150px;"><button class="btn btn-primary btn-block text-center" type="button" id="3">تقرير الفترة من الى&nbsp;</button></div>
            </div>
        </div>
    </div>
    <div style="margin: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center" data-bs-hover-animate="pulse"><img src="assets/img/analytics.png" style="width: 150px;height: 150px;"><button class="btn btn-primary btn-block text-center" type="button" id="4">تقرير الانواع للفترة من الى<br></button></div>
                <div class="col-md-4 text-center" data-bs-hover-animate="pulse"><img src="assets/img/cart.png" style="width: 150px;height: 150px;"><button class="btn btn-primary btn-block text-center" type="button" id="5">تقرير المشتريات للفترة من الى<br></button></div>
                <div class="col-md-4 text-center" data-bs-hover-animate="pulse"><img src="assets/img/folder.png" style="width: 150px;height: 150px;"><button class="btn btn-primary btn-block text-center" type="button" id="6">تقرير جميع الفواتير<br></button></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>
<script type="text/javascript">
$(document).ready(function(){
    
  $("button").click(function(){
    var i=this.id;
   if (i==1) {document.location.href="Report_day.php";}
   if (i==2) {document.location.href="Report_month.php";}
   if (i==3) {document.location.href="Report_from_to.php";}
   if (i==4) {document.location.href="Report_foods_from_to.php";}
   if (i==5) {document.location.href="Report_achat_from_to.php";}
   if (i==6) {document.location.href="Report_all_factures.php";} 
});
 
});
</script>

</html>