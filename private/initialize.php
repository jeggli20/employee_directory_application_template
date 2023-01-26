<?php
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . "/public");

$public_end = strpos($_SERVER["SCRIPT_NAME"], "/public") + 7;
$doc_root = substr($_SERVER["SCRIPT_NAME"], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once("database.php");
require_once("functions.php");

function autoload($class) {
    if(preg_match("/\A\w+\Z/", $class)) {
        include("classes/" . $class . ".class.php");
    }
}

spl_autoload_register("autoload");

$database = db_connect();
DatabaseObject::setup_database($database);
?>