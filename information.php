<?php
// for using session you need to start it and for login information and all this purposr 
session_start();
echo "welccome ".$_SESSION['username'];
// echo "pass is".$_SESSION['password'];
echo "email is".$_SESSION['email'];

// fror logiing out
//we need to destroy our  session variables  syntax is given below

session_start();
session_unset();
session_destroy();
echo "variable destroyed";







?>