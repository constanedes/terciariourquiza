<?php

/*
* Change the value of PASSWORD if you have set a password on the root userid
* Change NULL to port number to use DBMS other than the default using port 3306
*
*/

    define('HOSTNAME', NULL); // Passing the NULL value or "localhost" to this parameter, the local host is assumed. 

    define('USERNAME','root'); // To be completed if you have set a password to root

    define('PASSWORD','');

    define('DATABASE','escuela_urquiza'); // To be completed to connect to a database. The database must exist.

    define('PORT', 3308);  // Default must be NULL to use default port

    define('CHARSET', 'utf8');  


?>
