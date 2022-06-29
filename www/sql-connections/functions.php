<?php

// ini_set("display_errors", "On");//打开错误提示
// ini_set("error_reporting",E_ALL);//显示所有错误
//including the Mysql connect parameters.
include_once("../sql-connections/db-creds.inc");
include_once("../sql-connections/sqli-connect.php");

function checkPassword($username, $password)
{
	echo "checking"."<br>";
	global $table;
	global $con;
	$sql="SELECT * from $table where username='$username';";
	echo $sql."<br>";
	$result=mysqli_query($con,$sql);
	// echo mysqli_error($con);
	$row = mysqli_fetch_array($result);
	if($row["password"]==$password){return true;}
	else{return false;}
}
function checkUserExist($username)
{
	global $table;
	global $con;
	$sql="SELECT count(*) from $table where username='$username';";
	echo $sql."<br>";
	$result=mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo($row[0]);
	if($row[0]){return true;}
	else{return false;}
}

function addUser($username, $password)
{
	global $table;
	global $con;
	if(checkUserExist($username)){return false;}
	$sql="INSERT INTO $table VALUES ('$username','$password');";
	echo $sql."<br>";
	mysqli_query($con,$sql);
	return true;
}
// if(addUser("testt","123123")){echo "Success.";}
// else{echo "Faild,Username already exist.";}

function delUser($username)
{
	global $table;
	global $con;
	if(!checkUserExist($username)){return false;}
	$sql="DELETE  from $table where username='$username';";
	echo $sql."<br>";
	mysqli_query($con,$sql);
	return true;
}
// if(delUser("testt")){echo "Success.";}
// else{echo "Faild,Username don't exist.";}

function changePassword($username, $password)
{
	global $table;
	global $con;
	// if(!checkUserExist($username)){return false;}
	$sql="UPDATE $table SET password='$password' WHERE username = '$username';";
	echo $sql."<br>";
	mysqli_query($con,$sql);
	return true;
}
// if(changePassword("test","1111122")){echo "Success.";}


?>
