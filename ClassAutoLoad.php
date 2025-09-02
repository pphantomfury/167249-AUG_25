<?php

require_once 'conf.php';

$directories = array('Forms', 'Layouts', 'Global');

spl_autoload_register(function ($className) use ($directories) {
    foreach ($directories as $directory) {
        $filePath = __DIR__ . '/' . $directory . '/' . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
});

//Create an instance of the class
$hello = new classes();
$forms = new forms();
$layout = new layout();
