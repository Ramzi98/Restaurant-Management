
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
   .hmida{
    height: 100px;width: 100px;margin: 5px;
   }
    .asd {
    background:rgba(0,0,0,0);
    border:none;
}
  </style>
</head>
<body>

</body>
<script type="text/javascript">
$(document).on('keyup', '.search_text', function(){
  var search = $(this).val();
    var M=$('.M').val()
    var id=this.id;
    var image_id1=new Array() ;
    var image_id2=new Array() ;
    if($(this).val()=="")
      $(this).val('0')
  $(".search_text").each(function () {
            var t=$(this).val();
            var s=0;
            s = t[0]
              if(s=='0')
                  t[0]='';
            if(t.includes('/')){
              t=eval(t);}
            image_id1.push(parseFloat($(this).attr("id")));
            image_id2.push(parseFloat(t));
        });
    var data_str1 = image_id1.join(",");
    var data_str2 = image_id2.join(","); 
   $.ajax({
     url:"6.php",
     method:"POST",
     data:{source1:data_str1,source2:data_str2},
     success:function(data)
     {
      
     }
    })
   
   if(search != '')
    { 
      search=eval(search)
      fetch_data(search,id);

    }
    else
    {
     
     fetch_data(0,'');      
    }


   function fetch_data(query,id)
   {
    var action = "fetch";
    $.ajax({
     url:"Newbill_action5.php",
     method:"POST",
     data:{action:action,query:query,id:id,qte:search},
     success:function(data)
     {
      
      $('#image_data').html(data);
     }
    })
   }

  


});
</script>
<script type="text/javascript">

$(document).ready(function(){

  var image_id=new Array() ;
  $(".search_text").each(function () {
            
           

        });
 function s(query)
 {
  
  var action = "fetch";
  $.ajax({
   url:"Newbill_action5.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 
 
 //////////////////
  
});
</script>

</html>
<?php
//action.php


if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 mysqli_set_charset($connect,"utf8");
 if($_POST["action"] == "fetch")
 {
   if(isset($_POST["query"])){
    $id=(int)$_POST["query"];
  
   $query2 = "INSERT INTO  news(id,qte) values('$id',0)"; 
  mysqli_query($connect, $query2);
   $query2 = "INSERT INTO  new1(id,qte) values('$id',0)"; 
  mysqli_query($connect, $query2);
  $query2 = "INSERT INTO  new2(id,qte) values('$id',0)"; 
  mysqli_query($connect, $query2);
   }
   
   $sql = " 
          SELECT food1.image as name,food1.name_ar as name_ar,food1.prix as prix,food1.id as id,new1.qte as qte
          FROM  food1, new1
          WHERE food1.id = new1.id ";
 $sSQL= 'SET CHARACTER SET utf8'; 
 mysqli_query($connect,$sSQL);
 $result = mysqli_query($connect,$sql);

 while($row= mysqli_fetch_row($result)){
 $prix=$row[4]*$row[2];
$b=$row[0];                  echo '
                             <div class="col" style="background-color: #da9328;height: 40px;"><button id='.$row[3].' class="btn btn-primary bg-danger float-left delete" type="button"><i class="fa fa-close"></i></button><label style="font-size: 21px;">'.$row[1].'</label></div>
                            ';
                            echo ' <div class="col">
                            <img style="display:inline;" src="data:image/jpeg;base64,'.base64_encode($b ).'" style="height: 100px;width: 100px;margin: 5px;"  class="img-thumnail hmida" ><input class="search_text" id='.$row[3].'  type="text" value="0" style="width: 60px;"> ';
                            echo '</div>';
                            echo '<div class="col" id='.$row[3].' ><input value='.$prix.' id='.$row[3].' class="text-center col-form-label text-right asd '.$row[3].' "disabled/></div>';
                          
                           
                           echo '<div id="image_data"></div>';
 }

//////////////////////////////
 }

 

 if($_POST["action"] == "delete")
 {
  $id= $_POST['id'];
  
   
   //$query = "DELETE FROM food WHERE id = '$id'";
    //if(mysqli_query($connect, $query))
  //{
   
  //}
  /*$query = "UPDATE food SET id='$a',phone_num='$b',dates='$c',montant='$d',reduction='$e',total='$f',numero_abonnement='$g' WHERE id = '".$_POST["id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Updated into Database';
  }
  else{
    echo 'nope';
  }*/
   $query = "DELETE FROM news WHERE id = '$id'";
    if(mysqli_query($connect, $query))
  {
   
  }
 }
  
 
  //$query = "UPDATE tbl_images SET id = id-1 WHERE id>'".$_POST["image_id"]."' ";
  //mysqli_query($connect, $query);
 }

?>