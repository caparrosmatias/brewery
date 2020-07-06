<html>  
<body>  
   <form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  
<table border="1">  
   <tr>  
      <td colspan="2">Seleccionar promo</td>  
   </tr>  
   <tr>  
      <td>Promo 1</td>  
      <td><input type="checkbox" name="promo[]" value="P1"></td>  
   </tr>  
   <tr>  
      <td>Promo 2</td>  
      <td><input type="checkbox" name="promo[]" value="P2"></td>  
   </tr>  
   <tr>  
      <td>Promo 3</td>  
      <td><input type="checkbox" name="promo[]" value="P3"></td>  
   </tr>  
   <tr>  
      <td>Promo 4</td>  
      <td><input type="checkbox" name="promo[]" value="P4"></td>  
   </tr>
   <tr>  
      <td>Promo 5</td>  
      <td><input type="checkbox" name="promo[]" value="P5"></td>  
   </tr>  
   <tr>  
      <td>Promo 6</td>  
      <td><input type="checkbox" name="promo[]" value="P6"></td>  
   </tr>    
   <tr>  
      <!--<td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  -->
   </tr>  
</table>  

<br>

<table border="1">  
   <tr>  
      <td colspan="2">Seleccionar cervezas</td>  
   </tr>  
   <tr>  
      <td>Cerveza 1</td>  
      <td><input type="checkbox" name="cerveza[]" value="C1"></td>  
   </tr>  
   <tr>  
      <td>Cerveza 2</td>  
      <td><input type="checkbox" name="cerveza[]" value="C2"></td>  
   </tr>  
   <tr>  
      <td>Cerveza 3</td>  
      <td><input type="checkbox" name="cerveza[]" value="C3"></td>  
   </tr>  
   <tr>  
      <td>Cerveza 4</td>  
      <td><input type="checkbox" name="cerveza[]" value="C4"></td>  
   </tr>
   <tr>  
      <td>Cerveza 5</td>  
      <td><input type="checkbox" name="cerveza[]" value="C5"></td>  
   </tr>  
   <tr>  
      <td>Cerveza 6</td>  
      <td><input type="checkbox" name="cerveza[]" value="C6"></td>  
   </tr>    
   <tr>  
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  
   </tr>  
</table>  
</div>  
</form>  

<?php  
if(isset($_POST['sub']))  
{  
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="cerveceria";//database name  
$tbl_name="employee"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string  
$checkbox1=$_POST['promo'];
$checkbox2=$_POST['cerveza'];  
$chk="";
$chkc="";  
$id_usuario = 120;
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 

foreach($checkbox2 as $chk2)  
   {  
      $chkc .= $chk2.",";  
   }  
$in_ch="insert into pedidos(id_usuario, promos, cervezas) values ('$id_usuario','$chk','$chkc')";
if($in_ch==1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
?>  
</body>  
</html>  