
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

  .table td {
    background-color: white !important;
  }
  .face:hover {
  animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }
  
  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(4px, 0, 0);
  }
}

	 </style>
   
</head>
<body>

</body>
<script type="text/javascript">
$(document).ready(function(){
	$(".V").mouseover(function(){
		fetch_data(this.id);
    
      

});
  $( "button" ).mouseleave(function() {
     //fetch_data();
});
  fetch_data();
 function fetch_data(query)
 {
  var action = "fetch";
  $.ajax({
   url:"Newbill_action2.php",
   method:"POST",
   data:{action:action,query:query},
   success:function(data)
   {
    $('#image_2').html(data);
   }
  })
 }
});
</script>

</html>
<?php

if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 mysqli_set_charset($connect,"utf8");
 if($_POST["action"] == "fetch")
 {
 	
  $query = "SELECT * FROM type ORDER BY id DESC";
  $result = mysqli_query($connect, $query);
  echo '<div>';
  while($row = mysqli_fetch_array($result))
  { 
  	echo'<li class="nav-item face"><button  id='.$row[0].' class="nav-link active text-center border rounded border-light shadow-sm V" href="#" style="background-color: #da9328;margin: 3px;color: rgb(0,0,0);">'.$row[1].'<br>'.$row[2].'</button></li>'; 
  }
echo "</div>";
  
 
 }

 
 
}
?>