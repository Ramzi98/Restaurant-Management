<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>
<?php
//action.php

 
if(isset($_POST["action"]))
{$t=0;
 $connect = mysqli_connect("localhost", "root", "", "tutorial");
 if($_POST["action"] == "fetch")
 {
  //afcter les champs entre news et new1
  $query =" 
          SELECT id
          FROM  news ";
          $result = mysqli_query($connect, $query); 
          while($row = mysqli_fetch_array($result))
            {$id=$row[0]; }
   $query =" 
          SELECT t
          FROM  facture_temp ";
          $result = mysqli_query($connect, $query); 
          while($row = mysqli_fetch_array($result))
            {$t=$row[0]; }
            } 
  //efacer la table affiche les images
  $query = "TRUNCATE TABLE `news`";
 if(mysqli_query($connect, $query))
  {}
  $output = '
   <table class="table table-bordered table-dark">
    <tr>
    <thead style="background-color: #959595;">
     <th class="text-center" style="width: 20%;">الإجمالي مدير النظام</th>
     <th class="text-center" style="width: 20%;">العدد</th>
     <th class="text-center" style="width: 20%;">سعر الوحدة</th>
     <th class="text-center" style="width: 20% ;">النوع</th>
    </tr>
    </thead>
  ';
  $red;
  $m=0;
  $r=0;
  $t=0;
        $query =" 
          SELECT m,r,i,t
          FROM  facture_temp ";
          $result = mysqli_query($connect, $query); 
          while($row = mysqli_fetch_array($result))
            {
              $m=(double)$row[0];
              $r=(double)$row[1];
              $w=(double)$row[2];
              $t=(double)$row[3];
            } 

  
          $count=-5;
         $query = "SELECT count(*) from new1";
         $result = mysqli_query($connect, $query);
         while($row = mysqli_fetch_array($result))
        {$count=$row[0];}
             
        if($count>0){
              $sSQL= 'SET CHARACTER SET utf8'; 
              mysqli_query($connect,$sSQL);
             
          $query =" 
            SELECT DISTINCT food1.image as name,food1.name_ar as name_ar,food1.prix as prix,food1.id as id,new1.qte as qte
            FROM  food1, new1
            WHERE food1.id = new1.id ";
        }
            
          else{
              $sSQL= 'SET CHARACTER SET utf8'; 
              mysqli_query($connect,$sSQL);
              $query =" 
              SELECT food1.image as name,food1.name_ar as name_ar,food1.prix as prix,food1.id as id,news.qte as qte
              FROM  food1, news
              WHERE food1.id = news.id ";
          }
            
  $result = mysqli_query($connect, $query); 
  $total=0;
  $qte=0;
  while($row = mysqli_fetch_array($result))
  {   
      $qte=(double)$row["qte"];
     
      $mul=$qte*$row["prix"];
      $total=$total+$mul;
      $output .= '
    <tr>
      
      <td>'.$mul.'</td>
      <td>'.$qte.'</td>
      <td>'.$row["prix"].'</td>
      <td>'.$row[1].'</td>
    </tr>
   ';


   
  }
  $output .= '</table>';
  echo $output;
  echo " <table class='table table-bordered table-dark' >
                <tbody>";
                 echo'   <tr>
                        <td class="text-center" id="">'.$t.'</td>
                        <td class="text-center">الإجمالي</td>';
                echo "</tr>";   
                echo '</tbody>
            </table>';
$query = "TRUNCATE TABLE `new1`";
    if(mysqli_query($connect, $query)){} 
 }
 $d=date("Y-m-d");
 //insertion dals la factures et efacer les 2 tables intermediare
 if(!empty($d)&&!empty($m)||!empty($r)&&!empty($t))
    $query = "INSERT INTO `factures` (`dates`, `montant`, `reduction`, `total`) VALUES ('$d',$m,$r,$t)";
 if(mysqli_query($connect, $query))
  {
    
      $query = "TRUNCATE TABLE `facture_temp`";
    if(mysqli_query($connect, $query)){} 
    
    
  }


?>