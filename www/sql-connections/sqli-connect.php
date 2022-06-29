<?php


include_once("../sql-connections/db-creds.inc");
echo "connect_db".'<br>';

$con = mysqli_connect($host,$dbuser,$dbpass,$dbname);
// phpinfo();
?>




 