<?php
  $connect = mysqli_connect("localhost", "root", "", "tutorial");
  mysqli_set_charset($connect,"utf8");
   $c=0;
   $d=0;
   $f=0;
    if(isset($_POST["A"])||isset($_POST["R"])||isset($_POST["M"])||isset($_POST["P"])||isset($_POST["C"])||isset($_POST["T"])||isset($_POST["S"])||isset($_POST["G"]))
      {
        
        $a=$_POST["A"];
        $b=$_POST["R"];
        $c=$_POST["M"];
        $d=$_POST["G"];
        $A=$_POST["T"];
        $B=$_POST["C"];
        $C=$_POST["P"];
        $D=$_POST["S"];
        $a=((double)$c+(double)$d)-(double)$b;
        echo"fine";
        $query = "INSERT INTO customer(name,phone_num,P,R) VALUES ('$B','$A',$C,$D)";
        if(mysqli_query($connect, $query)){}
       
        $query = "INSERT INTO facture_temp(m,r,i,t) VALUES ('$c','$b','$d','$a')";
        if(mysqli_query($connect, $query)){}
  {
   

  }
    
      }
  ?>