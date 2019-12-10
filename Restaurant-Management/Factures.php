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
    <title>الفواتير</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
  <div  id="imageModal" class="modal fade" role="dialog">
         <div class="modal-dialog" style="background-color: #ffd69b;">
          <div class="modal-content" style="background-color: #ffd69b;">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
             <form id="image_form" method="post" enctype="multipart/form-data">
             <input type="hidden" name="action" id="action" value="insert" />
             <input type="hidden" name="image_id" id="image_id" />
                  <div style="margin: 10px;"  >
                    <div class="container" >
<!-------------------------------->
                        <div class="row">
                            <div class="col-md-6 text-right" style="padding: 10px;"><label class="col-form-label" style="font-family: 'Baloo Bhaijaan', cursive;font-size: 16px;background-color: rgba(0,0,0,0.2);padding: 9px;">الجوال</label></div>
                            <div class="col-md-6 text-left" style="padding: 12px;"><input type="text" style="height: 40px;" id="3"></div>
                        </div>
                    </div>
                </div>

<!-------------------------------->
                <div style="margin: 10px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-right" style="padding: 10px;"><label class="col-form-label" style="font-family: 'Baloo Bhaijaan', cursive;font-size: 16px;background-color: rgba(0,0,0,0.2);padding: 9px;">الاجمالي</label></div>
                            <div class="col-md-6 text-left" style="padding: 12px;"><input type="text" style="height: 40px;" id="5"></div>
                        </div>
                    </div>
                </div>
<!-------------------------------->
                <div style="margin: 10px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-right" style="padding: 10px;"><label class="col-form-label" style="font-family: 'Baloo Bhaijaan', cursive;font-size: 16px;background-color: rgba(0,0,0,0.2);padding: 9px;">الحصم</label></div>
                            <div class="col-md-6 text-left" style="padding: 12px;"><input type="text" style="height: 40px;" id="6"></div>
                        </div>
                    </div>
                </div>
<!-------------------------------->
                <div style="margin: 10px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-right" style="padding: 10px;"><label class="col-form-label" style="font-family: 'Baloo Bhaijaan', cursive;font-size: 16px;background-color: rgba(0,0,0,0.2);padding: 9px;">مجموع الفاتورة</label></div>
                            <div class="col-md-6 text-left" style="padding: 12px;"><input type="text" style="height: 40px;" id="7"></div>
                        </div>
                    </div>
                </div>
<!-------------------------------->
                 <div class="col text-center">
                  <button class="btn btn-primary bg-danger" type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Baloo Bhaijaan', cursive;margin-left: 25px;">إلغاء</button>
                  <button class="btn btn-primary bg-success" type="submit" name="insert" id="insert" value="Insert" style="margin: 15px;font-family: 'Baloo Bhaijaan', cursive;" >إضافة</button></div>
            </form>
         </div>
       
          </div>
         </div>
    </div>
  
<!--- tableau ------------------------------------>
    <div class="border-secondary shadow" style="background-color: #b0deff;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 offset-lg-7" style="margin-left: 0;height: 54px;">
                    <nav class="navbar navbar-light navbar-expand-md d-inline-block float-right" style="padding: 0px;">
                        <div class="container-fluid"><a class="navbar-brand" href="#"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse d-inline-block float-left"
                                id="navcol-1">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="padding-top: 12px;padding-right: 30px;font-size: 17px;">!مرحبا المستخدم</a></li>
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
                <div class="col-md-12 text-center"><label class="col-form-label border rounded border-secondary shadow" style="padding: 10px;font-size: 21px;margin: 1px;background-color: rgb(231,231,231);color: rgb(0,0,0);padding-top: 3px;padding-bottom: 3px;">قائمة الفواتير<br>Invoices List<br></label></div>
            </div>
        </div>
    </div>
    <div class="col text-center" style="padding-top: 10px;"><button class="btn btn-primary" type="button"><i class="fa fa-chevron-left"></i></button><label class="border rounded border-primary" style="background-color: #ffffff;width: 30px;">1</label><button class="btn btn-primary" type="button"><i class="fa fa-chevron-right"></i></button></div>
    <div
        class="col">
        <div class="table-responsive table-bordered" style="margin: 15px;margin-left: 3px;margin-right: 3px;">
          <input type="text" name="search_text" id="search_text" placeholder="البحث عن الفاتورة عن طريق رقمها" class="form-control" />
            <div id="image_data"></div>
        </div>
        </div>
        <div class="col text-center"><button class="btn btn-primary" type="button"><i class="fa fa-chevron-left"></i></button><label class="border rounded border-primary" style="background-color: #ffffff;width: 30px;">1</label><button class="btn btn-primary" type="button"><i class="fa fa-chevron-right"></i></button></div>
        <div
            class="col"><button class="btn btn-danger delete" type="button" style="margin: 10px;font-size: 18px;">حذف<i class="fa fa-close float-left" style="margin: 5px;margin-right: 8px;"></i></button><button class="btn btn-warning update" type="button" style="margin: 10px;font-size: 18px;">تعديل<i class="fa fa-pencil float-left" style="margin: 5px;margin-top: 6px;margin-right: 8px;"></i></button>
            <button id="add"
                class="btn btn-success text-center" type="button" id="add" style="margin: 10px;font-size: 18px;">جديد<i class="fa fa-plus float-left" style="margin: 5px;font-size: 16px;margin-top: 9px;margin-right: 10px;"></i></button>
                </div>
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>


<script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:"Feautures_action.php",
      method:"post",
      data:{query:query,action:"fetch"},
      success:function(data)
      {
        $('#image_data').html(data);
      }
    });
  }
  //partie bare de recherche
  $('#search_text').keyup(function(){
    var search = $(this).val();


    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
  // partie ajout modifier suprimer 
   $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#image_form')[0].reset();
  $('.modal-title').text("Add Image");
  
  $('#price_id').val('');
  $('#action').val('insert');
  $('#insert').val("insert");
 });

 $('#image_form').submit(function(event){
  event.preventDefault();
    var id;
     var action= $('#action').val();
     if(action=="update"){
        id=$('#image_id').val();
     }else{
        $('#image_id').val();
     }
     //tame daf3e
     //phone
     var c=$('#3').val();
     //total
     var e=$('#5').val();
     //reduction
     var f=$('#6').val();
     //total apres reduction
     var g=$('#7').val();
     e=parseFloat(e);
     f=parseFloat(f);
     g=parseFloat(g);
    $.ajax({
     url:"Feautures_action.php",
     method:"POST",
     data: {id:id,c:c,e:e,f:f,g:g,action:action},
     success:function(data)
     {
      load_data();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   
  
 });
 
 $(document).on('click', '.update', function(){
  var id;
  $("input:checkbox[name=chk]:checked").each(function () {
            
           
           id=parseInt($(this).attr("id"));
        });
  $('#image_id').val(id);
  $('#action').val("update");
  $('.modal-title').text("Update Image");
  $('#insert').val("update");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var image_id=new Array() ;
  $("input:checkbox[name=chk]:checked").each(function () {
            
           
            image_id.push(parseInt($(this).attr("id")));
        });
  var data_str = image_id.join(","); 
  var action = "delete";
  if(confirm("Are you sure you want to remove this image from database?"))
  {
   $.ajax({
    url:"Feautures_action.php",
    method:"POST",
    data:{source1: data_str, action:action},
    success:function(data)
    {
    load_data();
    }
   })
  }
  else
  {
   return false;
  }
 });
});
</script>






