<?php

//Do not remove this header
//This script package is distributed by Enforcer enforcer69@gmail.com, this file comes from kadar`s scripts
//You are free to distribute this package as long as the headers stay intact.

//This file must stay in the parent directory of the script folder and must be filled out correctly for the scripts to work.

$db_user = "root"; //your sql username goes here
$db_pass = "root"; //your sql password goes here
$db_name = "l2jdb";    //your database name goes here
$db_serv = "localhost"; //the address of the database goes here

$db = mysql_connect ( $db_serv, $db_user, $db_pass ) or die ("Coudn't connect to [$db_serv]");
mysql_select_db ( $db_name );

?>
