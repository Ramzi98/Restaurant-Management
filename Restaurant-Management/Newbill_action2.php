<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
      <style type="text/css" xml:space="preserve">
     
    ul{
        display:inline-block;
       
    }
    li{
        display:inline-block;
    }
   </style>

  </style>
</head>
<body>

</body>
<script type="text/javascript">
$(document).ready(function(){
  var i=0;
  
  $(".j").click(function(){
    i=this.id;
    fetch_data(this.id);
     $("#imp").show();
     id=this.id;

 // fetch_data5();

 function fetch_data5()
 { 
  
  var action = "fetch";
  $.ajax({
   url:"4.php",
   method:"POST",
   data:{},
   success:function(data)
   {
    
   }
  })
 }
});
  
   function s(query)
 {
  query=0
  var action = "fetch";
  $.ajax({
   url:"Newbill_action5.php",
   method:"POST",
   data:{action:action,query:query,id:id},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 fetch();

 function fetch_data(query)
 {
  var query = query;
  var action = "fetch";
  $.ajax({
   url:"Newbill_action4.php",
   method:"POST",
   data:{action:action,query:query},
   success:function(data)
   {
    $('#image_3').html(data);
   }
  })
 }
 $(document).on('click', '.delete', function(){
   id=$(this).attr("id");
  var check = $('.search_text').val();
  //


  query=check
 
  var action = "delete";
  if(confirm("Are you sure you want to remove this image from database?"))
  {
    
   $.ajax({
    url:"Newbill_action5.php",
    method:"POST",
    data:{id: id, action:action,query:query,i:i},
    success:function(data)
    {
    fetch_data()
    $('#image_3').html(data);
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
</html>
<?php

if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 
 if($_POST["action"] == "fetch")
 {
   $query = "SELECT food.name_an as name,food.image as image,food.id as id FROM food ORDER BY id DESC";

if(isset($_POST["query"])&&($_POST["query"]!="")){
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $search=(int)$search;
    
    $query = "SELECT food.name_an as name,food.image as image,food.id as id
              FROM food, type
              WHERE  type.name_an=food.type and type.id='$search'  ";
  }
  $result = mysqli_query($connect, $query);
  echo "<table><tr>";
  while($row = mysqli_fetch_array($result))
  {
   
    echo '<td ><button class="j n"  id='.$row[2].' style="border:none;padding: 0;border: none;background: none;"><img style="height: 110px;width: 110px;margin: 5px;border-color: blue;" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"  class="img-thumbnail" /></button>';
    
    echo'</br><div class="text-center">'.$row[0].'</div></td>';


   }
   echo '</table>';
   
   
 }

 
}
?>