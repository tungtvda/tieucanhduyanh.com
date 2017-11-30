<?php ob_start("ob_gzhandler");?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
require_once("../../config.php");
require_once(DIR."/common/hash_pass.php");
require_once DIR."/model/adminService.php";

if(isset($_POST["UserName"])&&isset($_POST["Pass"]))
{
    @session_start();
    $UserName=$_POST["UserName"];
    $Pass=hash_pass($_POST["Pass"]);
    $_SESSION["Admin"]='admin';
    header('Location: '.SITE_NAME.'/controller/admin/index.php');
    if(checkLogin($UserName)&&checkLogin($Pass))
    {
        $result=admin_Get("select * from admin where UserName='".$UserName."' and PassWord='".$Pass."'");
        if(count($result)>0)
        {
            if($result[0]->PassWord==$Pass)
            {
                    $_SESSION["username"]=$UserName;
                    $_SESSION["UserName"]=$UserName;
                    $_SESSION["UserId"]=$result[0]->Id;
                    $_SESSION["UserEmail"]=$result[0]->Email;
                    $_SESSION['user']=$UserName;
                    $_SESSION['userid']=$result[0]->Id;
                    $_SESSION["Admin"]=$UserName;
                    header('Location: '.SITE_NAME.'/controller/admin/index.php');
            }
            else
            {
                echo "<script type=\"text/javascript\">alert(\"Sai tên đăng nhập hoặc mật khẩu\")</script>";
            }
        }
        else
        {
            echo "<script type=\"text/javascript\">alert(\"Sai tên đăng nhập hoặc mật khẩu\")</script>";
        }
    }
    else
        {
            echo "<script type=\"text/javascript\">alert(\"Sai tên đăng nhập hoặc mật khẩu\")</script>";
        }
   
    
}
function checkLogin($string)
    {
        if(strrpos($string,"'")||strrpos($string,"=")||strrpos($string,"(")||strrpos($string,")")||strrpos($string,">")||strrpos($string,"<")||strrpos($string,"\\")||strrpos($string,"\""))
        {
            return false;
        }
        else return true;
    
    }
?>

		<title>Admin page | Sign In</title>
		<link rel="stylesheet" href="<?php echo SITE_NAME?>/view/admin/Themes/css/reset_login.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo SITE_NAME?>/view/admin/Themes/css/style_login.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo SITE_NAME?>/view/admin/Themes/css/invalid_login.css" type="text/css" media="screen"/>	
		<script type="text/javascript" src="<?php echo SITE_NAME?>/view/admin/Themes/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="<?php echo SITE_NAME?>/view/admin/Themes/js/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="<?php echo SITE_NAME?>/view/admin/Themes/js/facebox.js"></script>
		<script type="text/javascript" src="<?php echo SITE_NAME?>/view/admin/Themes/js/jquery.wysiwyg.js"></script>
	</head>
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Admin Page</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="<?php echo SITE_NAME ?>/view/admin/Themes/images/logo.png" alt="timphongtro.com.com">
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="" method="POST">
					<p>
						<label>Username</label>
						<input class="text-input" name="UserName" type="text"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" name="Pass" type="password"/>
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox">Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign In"/>
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
    </body>
	</html>
    