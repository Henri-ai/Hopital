<?php 
// stoker dans un autre dossier
define('DSN','mysql:host=localhost;dbname=hospitale2n;charset=utf8');
define('USER','nathan');
define('PASSWORD','.1siojeQfkX-fWp_');

//tab
define('HOUR',['09:00','09:30','10:00','10:30','11:00','11:30','12:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30']);


//regex
define('REGEX_NAME','^([a-zA-z]{2,25})$');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_PHONE','^([0-9]{10,11})$');

?>