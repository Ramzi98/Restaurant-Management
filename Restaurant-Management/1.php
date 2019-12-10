<?php
  $i=0;
  $count=0;
  $array=array();
  $src1= $_POST['source1'];
  $array1 = explode(",", $src1);
  print_r($array1);
  $src2= $_POST['source2'];
  $array2 = explode(",", $src2);
  print_r($array2);
  $connect = mysqli_connect("localhost", "root", "", "tutorial");
  mysqli_set_charset($connect,"utf8");
  $price=0;
  foreach ($array1 as $value){
  	echo $value;
  	$query = "SELECT prix FROM food where id='$value' ";
  	$result = mysqli_query($connect, $query);
  	 while($row = mysqli_fetch_array($result))
  	{$price=$row[0];
  	  echo $price;
  	  $array[$i]= $array2[$i]/$price;
  	  $i++;
  	 }
  }
  	print_r($array); 
  	$red=$_POST["all"];
    //insertion
  	$query = "INSERT INTO facture_temp(red) VALUES ('$red')";
        if(mysqli_query($connect, $query))  {echo "inserted";}
    
    print_r($array); 
    // verification
    foreach  (array_combine($array, $array1) as $value1 => $value2){
      $query = "SELECT count(*) from new1  where id='$value2'";
      $result = mysqli_query($connect, $query);
     while($row = mysqli_fetch_array($result))
      {$count=$row[0]+$count;}
    }
   
    //insertion pour les food
    if($count<=0){
      foreach  (array_combine($array1, $array) as $value1 => $value2){
      $query = "INSERT INTO  new1(id,qte) VALUES ('$value1','$value2')";
          if(mysqli_query($connect, $query))  {echo "inserted";}
      }
    }
    else{
      foreach  (array_combine($array1, $array) as $value1 => $value2){
        
      $query = "UPDATE new1 SET qte='$value2' where id='$value'";
          if(mysqli_query($connect, $query))  {echo "updated";}
          if(mysqli_query($connect, $query))
          {
           echo 'Image Updated into Database';
          }
          else{
            echo 'nope';
          }
      }
    }
  	
    // insertion 2
    foreach  ($array1 as $value2){
    $query = "INSERT INTO  news(id,qte) VALUES ('$value2')";
        if(mysqli_query($connect, $query))  {echo "inserted";}
    }
  ?>