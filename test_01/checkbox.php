<?php  
include ("config.php");  
$checkbox1 = $_POST['chkl'] ;  
if ($_POST["Submit"]=="Submit")  
{  
for ($i=0; $i<sizeof ($checkbox1);$i++) {  
$query="INSERT INTO employee (name) VALUES ('".$checkboxl[$i]. "')";  
mysql_query($query) or die(mysql_error());  
}  
echo "Record is inserted";  
}  
?>  