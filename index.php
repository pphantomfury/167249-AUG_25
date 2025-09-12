<?php
require 'Plugins/vendor/autoload.php';
require_once 'ClassAutoLoad.php';
require_once 'conf.php';

$ObjLayout = new layout();
$forms = new forms();
$ObjSendMail = new SendMail();

$content = $forms->handleSignupForm($ObjSendMail, $conf);


$ObjLayout->header($conf);
$ObjLayout->nav($conf);
$ObjLayout->banner($conf);
$ObjLayout->content($content);
$ObjLayout->footer($conf);
?>