<?php
if (isset($_POST['submit'])) 
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tutorial";

    try
    {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        
        $restaurant_name=$_POST['restaurant_name'];
        $restaurant_owner=$_POST['restaurant_owner'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $remarks=nl2br($_POST['remarks']);
        $logo_width=$_POST['logo_width'];
        $logo_height=$_POST['logo_height'];
       /* $img_name=$_FILES['logo']['name'];
        $img_type = $_FILES['logo']['type'];
        $img_blob = file_get_contents($_FILES['logo']['tmp_name']);
        */
        $location=$_POST['location'];
        $appear_phone=isset($_POST['appear_phone']);
        $appear_email=isset($_POST['appear_email']);

        $ret        = false;
        $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['logo']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else 
        {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['logo']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['logo']['type'];
            $img_nom  = $_FILES['logo']['name'];
            $img_blob = file_get_contents ($_FILES['logo']['tmp_name']);
            addslashes($img_blob);
            $sql1=$conn->prepare('SELECT * from parameter');
            $sql1->execute();
            $id1=0;
            for($i=0; $row = $sql1->fetch(); $i++){
                $id1=$row['id'];
            }
            if($id1==0)
            {
                $stmt=$conn->prepare('INSERT INTO parameter (restaurant_name,restaurant_owner,email,phone,remarks,
                logo_width,logo_height,img_nom,img_taille,img_type,img_blob,location,appear_phone,appear_email)
                VALUES (:restaurant_name,:restaurant_owner,:email,:phone,:remarks,:logo_width,:logo_height,:img_nom,:img_taille,:img_type,
                :img_blob,:location,:appear_phone,:appear_email)');

                $stmt->bindParam(':restaurant_name', $restaurant_name);
                $stmt->bindParam(':restaurant_owner', $restaurant_owner);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':remarks', $remarks);
                $stmt->bindParam(':logo_width', $logo_width);
                $stmt->bindParam(':logo_height', $logo_height);
                $stmt->bindParam(':img_nom', $img_nom);	
                $stmt->bindParam(':img_taille', $img_taille);	
                $stmt->bindParam(':img_type', $img_type);	
                $stmt->bindParam(':img_blob', $img_blob);
                $stmt->bindParam(':location', $location);
                $stmt->bindParam(':appear_phone', $appear_phone);
                $stmt->bindParam(':appear_email', $appear_email);
                

                $stmt->execute();
                header('Location: Parameter.php'); 
            }
            else
            {
                $stmt=$conn->prepare("UPDATE parameter SET restaurant_name=:restaurant_name , restaurant_owner=:restaurant_owner
                 , email=:email , phone=:phone , remarks=:remarks , logo_width=:logo_width , logo_height=:logo_height 
                 ,img_nom=:img_nom ,img_taille=:img_taille ,img_type=:img_type ,img_blob=:img_blob ,location=:location 
                 ,appear_phone=:appear_phone ,appear_email=:appear_email WHERE id=$id1");

                $stmt->bindParam(':restaurant_name', $restaurant_name);
                $stmt->bindParam(':restaurant_owner', $restaurant_owner);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':remarks', $remarks);
                $stmt->bindParam(':logo_width', $logo_width);
                $stmt->bindParam(':logo_height', $logo_height);
                $stmt->bindParam(':img_nom', $img_nom);	
                $stmt->bindParam(':img_taille', $img_taille);	
                $stmt->bindParam(':img_type', $img_type);	
                $stmt->bindParam(':img_blob', $img_blob);
                $stmt->bindParam(':location', $location);
                $stmt->bindParam(':appear_phone', $appear_phone);
                $stmt->bindParam(':appear_email', $appear_email);

                $stmt->execute();
                
        
                header('Location: Parameter.php'); 
            }


        }

    }
    catch(PDOException $e)
    {
        echo "<br>Error: " . $e->getMessage();
    }
	    $conn = null;

}
elseif (isset($_POST['remove_all_bills'])) 
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tutorial";
    try
    {
    
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
         //set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare("DELETE FROM factures");
        $stmt->execute();
        header('Location: Parameter.php'); 
    }
    catch(PDOException $e)
    {
        echo "<br>Error: " . $e->getMessage();
    }
	$conn = null;
}
else
{
    $_SESSION['update']=0;
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tutorial";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error)
	{
    	die("Probleme de Connection : " . $conn->connect_error);
	}
    $restaurant_name="";
    $restaurant_owner="";
    $email="";;
    $phone="";
    $remarks="";
    $logo_width="";
    $logo_height="";
    $img_nom="";
    $img_taille="";
    $img_type="";
    $img_blob="";
    $location="";
    $appear_phone=0;
    $appear_email=0;
    $s1=0;
    $s2=0;
		$sql = "SELECT * FROM parameter ";
		$result = $conn->query($sql);

        if ($result->num_rows > 1) 
		{
            echo'erreur plusieur profil existe dans la bdd';
        }
        elseif($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) 
			{
                $restaurant_name=strip_tags($row['restaurant_name']);
                $restaurant_owner=strip_tags($row['restaurant_owner']);
                $email=strip_tags($row['email']);
                $phone=strip_tags($row['phone']); 
                $remarks=strip_tags($row['remarks']);
                $logo_width=strip_tags($row['logo_width']);
                $logo_height=strip_tags($row['logo_height']);
                $img_nom=strip_tags($row['img_nom']); 	
                $img_taille=strip_tags($row['img_taille']);	
                $img_type=strip_tags($row['img_type']);	
                $img_blob=strip_tags($row['img_blob']);
                $location=strip_tags($row['location']);
                $appear_phone=strip_tags($row['appear_phone']);
                $appear_email=strip_tags($row['appear_email']);
            }
            if($appear_email)
                $s1="checked";
            else
                $s1="";
            if($appear_phone)
                $s2="checked";
            else
                $s2="";
                
        }

	
    echo'
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Parameter</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&amp;subset=arabic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aref+Ruqaa">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan&amp;subset=arabic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Changa">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <script>
            function removeall() 
            {
                alert("لقد تم حذف جميع الفواتير بنجاح")
            }
            function saved() 
            {
                alert("لقد تم حفظ المعلومات بنجاح")
            }
        </script>
    </head>

    <body style="background-color: #ffd69b;">
        <form action="Parameter.php" method="POST" enctype="multipart/form-data">
        <div class="border-secondary shadow" style="background-color: #b0deff;height: 54px;">
            <div class="container">
                <div class="row" style="background-color: rgba(181,156,156,0);">
                    <div class="col-md-12 offset-lg-7" style="margin-left: 0px;">
                        <nav class="navbar navbar-light navbar-expand d-inline-block float-right" style="padding: 0px;">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                                <div class="collapse navbar-collapse d-inline-block float-left" id="navcol-1">
                                    <ul class="nav navbar-nav">
                                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="padding-top: 12px;padding-right: 30px;font-size: 17px;">!مرحبا المستخدم</a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link active border rounded border-primary shadow-lg" href="#" style="font-size: 23px;background-color: #fdc472;padding-bottom: 10px;">نظام المطعم</a></li>
                                         <li class="nav-item" role="presentation"><a class="nav-link active border rounded border-primary shadow-lg" href="a.php" style="font-size: 23px;background-color:red;height: 54px;">خروج</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center"><label class="col-form-label border rounded border-secondary shadow d-block" style="padding: 10px;font-size: 21px;margin: 1px;background-color: rgb(231,231,231);color: rgb(0,0,0);padding-top: 3px;padding-bottom: 3px;">إعدادات المطعم<br>Parameter<br></label></div>
                </div>
            </div>
        </div>
        <div class="table-responsive table-bordered text-right" style="padding: 15px;">
            <table class="table table-bordered">
                <tbody style="background-color: #fff4e3;">
                    <tr>
                        <td style="width: 20%;">
                            <input type="file" name="logo" id="logo">
                            <td style="width: 20%;">: شعار المطعم</td>
                        <td style="width: 20%;"><input type="text" id="restaurant_name" name="restaurant_name" value="'.$restaurant_name.'"></td>
                        <td style="width: 20%;">&nbsp;: اسم المطعم</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="location" name="location" value="'.$location.'"></td>
                        <td>: موقع المطعم</td>
                        <td><input type="text" id="restaurant_owner" name="restaurant_owner" value="'.$restaurant_owner.'"></td>
                        <td>&nbsp;: مالك المطعم</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="appear_phone" name="appear_phone" '.$s2.'></td>
                        <td>عرض الجوال في الفاتورة ؟</td>
                        <td><input type="email" id="email" name="email" value="'.$email.'"></td>
                        <td>: البريد الإلكتروني</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="appear_email" name="appear_email" '.$s1.'></td>
                        <td>عرض الإيميل في الفاتورة ؟</td>
                        <td><input type="text" inputmode="tel" id="phone" name="phone" value="'.$phone.'"></td>
                        <td>: رقم جوال المطعم</td>
                    </tr>
                    <tr>
                        <td><input class="btn btn-primary bg-danger" type="submit" id="remove_all_bills" name="remove_all_bills" value="حذف جميع الفواتير" onclick="removeall()"/></td>
                        <td class="text-right justify-content-lg-center align-items-lg-center">حذف جميع الفواتير ؟</td>
                        <td><textarea style="width: 90%;height: 80px;" id="remarks" name="remarks">'.$remarks.'</textarea></td>
                        <td>: ملاحضات اسفل الفاتورة</td>
                    </tr>
                    <tr>
                        <td><input type="text" inputmode="numeric" id="logo_height" name="logo_height" value="'.$logo_height.'"></td>
                        <td>: طول الشعار</td>
                        <td><input type="text" inputmode="numeric" id="logo_width" name="logo_width" value="'.$logo_width.'"></td>
                        <td>: عرض الشعار</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col text-center"><input class="btn btn-primary bg-success" type="submit" style="width: 100px;height: 41px;" name="submit" value="حفظ" onclick="saved()" /></div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-animation.js"></script>
    </form>

    </body>

    </html>';
}

?>