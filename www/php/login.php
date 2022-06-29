<form action="login.php" method="post">
    <fieldset>
        <legend>Login</legend>
        <ul>
            <li> <label>Username:</label> <input type="text" name="username"> </li>
            <li> <label>Password:</label> <input type="password" name="password"> </li>
            <li> <label> </label> <input type="submit" name="login" value="1"> </li>
            <li> <label> </label> <input type="submit" name="subscribe" value="1"> </li>
        </ul>
    </fieldset>
</form>
<?php 
header('Content-type:text/html; charset=utf-8');    
include_once("../sql-connections/functions.php");
session_start();

if (isset($_POST['login'])) {		
    # 接收用户的登录信息		
    $username = $_POST['username'];		
    $password = $_POST['password'];		
    // 判断提交的登录信息		
    if (($username == '') || ($password == '')) {			
        // 若为空,视为未填写,提示错误,并3秒后返回登录界面			
        header('refresh:3; url=login.php');			
        echo "用户名或密码不能为空,系统将在3秒后跳转到登录界面,请重新填写登录信息!";			
        exit;		} 
        elseif (!checkPassword($username,$password)) {			
            # 用户名或密码错误,同空的处理方式			
            header('refresh:3; url=login.php');			
            echo "用户名或密码错误,系统将在3秒后跳转到登录界面,请重新填写登录信息!";			
            exit;		
        } elseif (($username = 'username') && ($password = 'password')) {			
            # 用户名和密码都正确,将用户信息存到Session中			
            $_SESSION['username'] = $username;			
            $_SESSION['islogin'] = 1;			
            // 处理完附加项后跳转到登录成功的首页			
            header('location:../php/mainView.php');		
        }	
}
elseif(isset($_POST['login'])){
    $username = $_POST['username'];		
    $password = $_POST['password'];		
    // 判断提交的登录信息		
    if (($username == '') || ($password == '')) {			
        // 若为空,视为未填写,提示错误,并3秒后返回登录界面			
        header('refresh:3; url=login.php');			
        echo "用户名或密码不能为空,系统将在3秒后跳转到登录界面,请重新填写登录信息!";			
        exit;		} 
        elseif (!checkPassword($username,$password)) {			
            # 用户名或密码错误,同空的处理方式			
            header('refresh:3; url=login.php');			
            echo "用户名或密码错误,系统将在3秒后跳转到登录界面,请重新填写登录信息!";			
            exit;		
        } elseif (($username = 'username') && ($password = 'password')) {			
            # 用户名和密码都正确,将用户信息存到Session中			
            $_SESSION['username'] = $username;			
            $_SESSION['islogin'] = 1;			
            // 处理完附加项后跳转到登录成功的首页			
            header('location:../php/mainView.php');		
        }	
}
        
?>