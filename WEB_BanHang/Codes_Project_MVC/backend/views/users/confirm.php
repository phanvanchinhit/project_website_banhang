<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="header">
    <div class="header-main">
        <h1>Confirm</h1>
        <div class="header-bottom">
            <div class="header-right w3agile">

                <div class="header-left-bottom agileinfo">

                    <form action="" method="post">
                        <input type="email"  value="<?php echo isset($_GET['email'])? $_GET['email'] :'' ?>" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
                        <input type="password"  value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
                        <input type="password"  value="confirmPassword" name="confirmPassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"/>
                        <div class="remember">
			             <span class="checkbox1">
							   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
						 </span>
                            <div class="forgot">
                                <h6><a href="index.php?controller=login&action=forgot">Forgot Password?</a></h6>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <input type="submit" name="submit" value="Login">
                    </form>
                    <?php
                    echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";
                    ?>
                    <div class="header-left-top">
                        <div class="sign-up"> <h2>or</h2> </div>

                    </div>
                    <div class="header-social wthree">
                        <a href="#" class="face"><h5>Facebook</h5></a>
                        <a href="#" class="twitt"><h5>Twitter</h5></a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!--header end here-->
<div class="copyright">
    <p>© 2020 Login Form. All rights reserved | Design by  <a href="https://www.messenger.com/t/phanvanchinh2x" target="_blank">  pvchinhit </a></p>
</div>
<!--footer end here-->
</body>
</html>
<!--header start here-->

