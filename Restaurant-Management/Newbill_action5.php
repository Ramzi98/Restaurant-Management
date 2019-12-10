<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
   .hmida{
    height: 100px;width: 100px;margin: 5px;
   }
    
  </style>
</head>
<body>

</body>
<script type="text/javascript">
$(document).on('keyup', '.search_text', function(){

  
var sum = 0;  
 
setTimeout(function(){
        $(".asd").each(function() 

{ 
  
  
 
  
});

 
 }

     
    }, 5);      

 
  


});
</script>
<script type="text/javascript">
$(document).ready(function(){

var total = 0; 
var t=0;
var array=[]

 
setTimeout(function(){
        $(".asd").each(function() 
{ 
  
  
 
  
});

     
    }, 5);       


 $('.all').attr('value', total)
   var val=0;
   val=$('.a').val();
   var id=$('.a').attr('id');
   $('.'+id).attr('value', val)
     var image_id=new Array() ;   
    $(".asd").each(function() 
{ 
  t=$(this).val();
   //t=eval(t);
  total=parseFloat(t)+parseFloat(total);

});
    var data_str = image_id.join(","); 
    var S=$("#s").val();
    var G=$("#G").val();
    
    $('.M').attr('value', total)
    $('.all').val(total)
    var all=$(".M").val()
    var S=$("#P").val()
    var t=(parseFloat(G)+parseFloat(all))-parseFloat(S);
    $("#R").val(t)


});
</script>

</html>
</html>
<?php
//action.php


if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 mysqli_set_charset($connect,"utf8");
 if($_POST["action"] == "fetch")
 {
  $prix=0;
   $id=-5;
   $i=-5;
   if((isset($_POST["query"]))||(isset($_POST["id"])))
   {

    $id=(double)$_POST["query"];
   $i=(double)$_POST["id"];
  $query2 = "INSERT INTO  new1(id,qte) values($i,'$id')"; 
  mysqli_query($connect, $query2);
   $query2 = "INSERT INTO  news(id) values('$id')"; 
  mysqli_query($connect, $query2);
}
   $sql = " 
          SELECT food.image as name,food.name_ar as name_ar,food.prix as prix,food.id as id
          FROM  food, news
          WHERE food.id = news.id and food.id='$i' ";
 $sSQL= 'SET CHARACTER SET utf8'; 
 mysqli_query($connect,$sSQL);
 $result = mysqli_query($connect,$sql);
 while($row= mysqli_fetch_row($result)){

$b=$row[0];
if(isset($_POST["query"]))
{$id=(double)$id;
if($row[3]==$i)
{ 
  $prix=(double)$row[2];
  $prix=$id*$prix;
}

}


                          
echo "<input type='hidden' id=".$i."  value=".$prix." class="."a".">" ;
 }

//////////////////////////////
 }

 

 if($_POST["action"] == "delete")
 {
  $prix=0;
  $s= $_POST['id'];
   if(isset($_POST["query"])&&isset($_POST["id"]))
   {$id=(int)$_POST["query"];
   $i=(int)$_POST["id"];}
  
   
   $query = "DELETE FROM news WHERE id = '$s'";
    if(mysqli_query($connect, $query))
  {

   
   $sql = " 
          SELECT food.image as name,food.name_ar as name_ar,food.prix as prix,food.id as id
          FROM  food, news
          WHERE food.id = news.id ";
 $sSQL= 'SET CHARACTER SET utf8'; 
 mysqli_query($connect,$sSQL);
 $result = mysqli_query($connect,$sql);

  }
   $query = "UPDATE news SET qte='0' ";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Updated into Database';
  }
  else{
    echo 'nope';
  }
 }

 }

?>