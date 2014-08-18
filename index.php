<!DOCTYPE html>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if (isset($_SESSION['username'])) {
    //initiate a SAML2 request and then redirect to google
    header("location:http://mail.google.com/");
} else {
    ?>

    <html lang='en'>
        <head>
            <meta charset="UTF-8" /> 
            <title>
                Swifta Single Sign On
            </title>
            <link rel="stylesheet" type="text/css" href="style.css" />
        </head>
        <script type="text/javascript" src="js/jquery.js"></script> 
        <script type="text/javascript" src="js/main.js"></script> 
        <body>

            <div id="wrapper">

                <form name="login-form" class="login-form" action="" method="post">

                    <div class="header">
                        <h1>Login Form</h1>
                        <span>Fill out your google login details in the space provided below.</span>
                        <div><span>Incorrect login credentials.</span></div>
                    </div>

                    <div class="content">
                        <input name="username" id="username" type="text" class="input username" placeholder="Email Address" />
                        <div class="user-icon"></div>
                        <input name="password" id="password" type="password" class="input password" placeholder="Password" />
                        <div class="pass-icon"></div>		
                    </div>

                    <div class="footer">
                        <input type="button" name="submit" value="Login" class="button" />
                        <img src="images/loading_icon.gif" alt="loading"/>

                </form>

            </div>
            <div class="gradient"></div>


        </body>
    </html>
    <?php
}
?>