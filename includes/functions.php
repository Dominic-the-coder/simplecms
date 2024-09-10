<?php

//connect to database
function connectToDB() {
// setup database credential
$host = "localhost";
$database_name = "simplecms"; //connect to which database
$database_user = "root";
$database_password = "password";

//connect to database
$database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    $database_user,
    $database_password
);

return $database;

}

// set error message
function setError( $error_message, $redirect_page ) {
    $_SESSION["error"] = $error_message;
    // redirect back to login page
    header("Location: " . $redirect_page );
    exit;
}
