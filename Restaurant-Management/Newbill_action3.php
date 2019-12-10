<!DOCTYPE html>
<html>
<head>
  <title></title>
 
</head>
<body>

</body>
<script type="text/javascript">
$(document).ready(function(){
  $(".j").click(function(){
    fetch_data(this.id);
    

  
});
 fetch();

 function fetch_data(query)
 {
  
  var action = "fetch";
  $.ajax({
   url:"Newbill_action4.php",
   method:"POST",
   data:{action:action,query:query},
   success:function(data)
   {
    
   }
  })
 }
});
</script>
</html>
<?php
//action.php

if(isset($_POST["action"]))
{

  if($_POST["action"] == "fetch")
 {
  $connect = mysqli_connect("localhost", "root", "", "tutorial"); 
  $id=(int)$_POST["query"];
  
   $query2 = "INSERT INTO  news(id) values('$id')"; 
  mysqli_query($connect, $query2);
  $sql = " 
          SELECT food.image as name,food.name_ar as name_ar,food.prix as prix,food.id as id
          FROM  food, news
          WHERE food.id = news.id ";
 $sSQL= 'SET CHARACTER SET utf8'; 
 mysqli_query($connect,$sSQL);
 $result = mysqli_query($connect,$sql);
 while($row= mysqli_fetch_row($result)){
$b=$row[0];                 
                            echo '
                             <div class="col" style="background-color: #da9328;height: 40px;"><button id='.$row[3].' class="btn btn-primary bg-danger float-left delete" type="button"><i class="fa fa-close"></i></button><label style="font-size: 21px;">'.$row[1].'</label></div>
                            ';
                            echo ' <div class="col">
                            <img style="display:inline;" src="data:image/jpeg;base64,'.base64_encode($b ).'" style="height: 100px;width: 100px;margin: 5px;"  class="img-thumnail hmida" ><input type="text" value="1" style="width: 60px;"> ';
                            echo '</div>';
                            echo '<div class="col"><label class="col-form-label text-right">'.$row[2].'<br></label></div>';
                         

  
                            

 }
}
}

 

?>