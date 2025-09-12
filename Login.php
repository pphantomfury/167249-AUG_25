<?php
require_once 'ClassAutoLoad.php';
$conf = require_once 'conf.php';
require_once 'layout.php';

$ObjLayout = new layout();
$ObjDatabase = new Database($conf);
$forms = new forms($ObjDatabase);

$content = $forms->handleLoginForm();

$ObjLayout->header($conf);
$ObjLayout->nav($conf);
$ObjLayout->content($content);
$ObjLayout->footer($conf);
