<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-dark">
        <form method="post" style="padding-top: 0px;padding-bottom: 40px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration" style="width: 238px;padding: 0px;"><label for="faf" style="font-size: 31px;color: #ffffff;width: 174px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px;">نظام المطعم</label><img src="assets/img/cooking.png" style="width: 109px;padding-bottom: 19px;"></div>
            <div class="form-group"><input class="form-control" type="text" name="user" placeholder="Email" id="user"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" id="password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" id="submit" type="submit" style="background-color: rgb(136,110,43);">Log In</button></div>
            <div id="erreur" class="text-center text-danger"></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>
<script type="text/javascript">
     $(function() {
  $("#submit").click(function() {
  var user = $("#user").val();
  var password = $("#password").val();

if(user=='' || password=='')
{
  $('#erreur').html("ادخل كلمة مرورو وكلمة سر")
  $('.success').fadeOut(200).hide();
  $('.error').fadeOut(200).show();
}
else
{
    $('.erreur').fadeOut(200).hide();
  $.ajax({
    type: "POST",
    url: "check.php",
    data: {user:user,password:password},
    success: function(response){
        if(response == 1){
            window.location = "Home_user.php";
        }
        if(response == 2){
            window.location = "Home_admin.php";
        }
        else{
         $('#erreur').html("خطا في كلمة المرورو او كلمة المستخدم")
     }
     $('.success').fadeIn(200).show();
   
    }
  });
}
return false;
});
});
 
</script>

</html>