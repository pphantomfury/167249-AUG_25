<?php
require_once __DIR__ . '/Plugins/vendor/autoload.php';
require_once 'ClassAutoLoad.php';
require_once 'conf.php';

$ObjSendMail = new SendMail();

$mailCnt = [
    'name_from' => 'ICS Community',
    'email_from' => 'eliud.obosi@strathmore.edu',
    'name_to' => 'Mazic Studios',
    'email_to' => 'mazicstudio@gmail.com',
    'subject' => 'Welcome to ICS Community',
    'body' => 'We are glad to have you on board.'
];
$ObjSendMail->Send_Mail($conf, $mailCnt);

echo "try.php executed successfully\n";