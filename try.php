<?php
require_once 'ClassAutoLoad.php';

$mailCnt = [
    'name_from' => 'ICS Community',
    'email_from' => $conf['eliud.obosi@strathmore.edu'],
    'name_to' => 'Mazic Studios',
    'email_to' => 'mazicstudio@gmail.com',
    'subject' => 'Welcome to ICS Community',
    'body' => 'We are glad to have you on board.'
];
$ObjSendMail->Send_Mail($conf, $mailCnt);