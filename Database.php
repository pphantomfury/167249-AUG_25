<?php
// Database configuration
require_once 'conf.php'; // Load configuration

$mysqli = new mysqli(
    $conf['db_host'],
    $conf['db_user'],
    $conf['db_pass'],
    $conf['db_name']
);

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Set charset to UTF-8
$mysqli->set_charset("utf8");
