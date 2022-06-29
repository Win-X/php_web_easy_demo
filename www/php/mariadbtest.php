<?php
include_once("../sql-connections/db-creds.inc");
include_once("../sql-connections/sqli-connect.php");


$sql="SELECT * from $table ;";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if($row){
    echo "error0";
echo $row["username"];
echo $row["password"];}
else{
    echo "error";
}
// while($v = $result->fetch_row())
// {
//     echo implode(' | ',$v).'<br>';
// }

?>