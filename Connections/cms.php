<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cms = "localhost";
$database_cms = "kim_4site";
$username_cms = "kim_larocca";
$password_cms = "Lotus18641864!";
$cms = mysqli_connect($hostname_cms, $username_cms, $password_cms, $database_cms) or trigger_error(mysqli_error(),E_USER_ERROR);
$websiteID = 18;
$idxLink = 'http://www.marcoareamls.com/cgi-mrc/BR_login?057661';
$homePage = 115;
$aboutmePage = 116;
$listingsPage = 117;
$contactPage = 120;
$localinfoPage = 119;
$searchPage = 118;
?>
