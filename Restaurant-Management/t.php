<?php
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 $date=date("Y-m-d");
 $b=0;
 $c=0;
 $v=$_POST["query2"];
 $d=$_POST["query1"];
 $query = "SELECT sum(price) FROM achat where data between '$d' and '$v' ";
         $result = mysqli_query($connect, $query);
          while($row= mysqli_fetch_row($result)){$b=$row[0];}
 $query = "SELECT sum(total) FROM factures where dates between '$d' and '$v'  ";
         $result = mysqli_query($connect, $query);
          while($row= mysqli_fetch_row($result)){$c=$row[0];}
      $b=$c-$b;
      echo  $b;
 ?>