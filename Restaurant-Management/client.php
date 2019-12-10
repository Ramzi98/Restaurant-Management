<?php
session_start();
if($_SESSION['type'] !="user"&&$_SESSION['type'] !="admin")
     header('Location: home.php'); 
?>
<table class="table table-bordered table-dark">
                <thead style="background-color: #959595;">
                    <tr>
                        <th class="text-center" style="width: 25%;">نوع العميل</th>
                        <th class="text-center" style="width: 25%;">رقم الاشتراك</th>
                        <th class="text-center" style="width: 25%;">الجوال</th>
                        <th class="text-center" style="width: 25%;">اسم العميل</th>
                    </tr>
                </thead>
                <tbody class="text-right">
                    <tr>
                        <td class="text-right">شخص</td>
                        <td class="text-right">201901</td>
                        <td class="text-right">567890012</td>
                        <td class="text-right">Nassim</td>
                    </tr>
                    <tr>
                        <td class="text-right">شركة</td>
                        <td class="text-right">201902</td>
                        <td class="text-right"><br></td>
                        <td class="text-right">Tarek</td>
                    </tr>
                </tbody>
            </table>