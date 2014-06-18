<?php
$connect_error = 'Sorry, we\'ve run into a problem. It\'ll be fixed soon.';

//mysql_connect('mysql2044int.cp.blacknight.com', 'u1269666_farmer', 'x(Ol3p[9S)') or die($connect_error);
//mysql_select_db('db1269666_farmrecorder');

mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('phplogin');
?>