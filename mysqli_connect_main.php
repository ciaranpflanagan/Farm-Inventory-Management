<?php
// This File Contains The Database Access Info.
// This File Also Establishes A Connection to MySQL, Selects The Database, And Sets The Encoding.

// Setting the database access info as constants
//DEFINE ('DB_USER', 'u1269666_manager');
//DEFINE ('DB_PASSWORD', 'kA_0,X(:xj');
//DEFINE ('DB_HOST', 'mysql2111int.cp.blacknight.com');
//DEFINE ('DB_NAME', 'db1269666_manager');

// Setting the database access info as constants for LOCAL site
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'db1269666_manager');

// Making the connection
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Couldn\'t connect to MySQL: ' . mysqli_connect_error() );

// Setting the encoding
mysqli_set_charset($dbc, 'utf8');
