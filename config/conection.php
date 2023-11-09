<?php

//$conection = mysqli_connect('_SERVER_','_USER_','_PASSWORD_','_DB_NAME_','_PORT_');
//$conection = mysqli_connect("localhost", "websor", "st78ellar%HH7.", "stellarwholesaleinc", "3306");
//$conection = mysqli_connect("127.0.0.1", "root", "", "stellar wholesale inc", "3308"); //LOCAL VARIABLE
$conection = mysqli_connect("odoo.biofloral.com", "bioflora_odoouser", "LwrbtV5iivNLwrbtV5iivN", "bioflora_odoo"); //SERVER

return $conection;

?>