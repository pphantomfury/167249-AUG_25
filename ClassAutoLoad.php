<?php
//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'Plugins/PHPMailer/vendor/autoload.php';
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
$ObjSendMail = new SendMail();
$forms = new forms();
$layout = new layout();
