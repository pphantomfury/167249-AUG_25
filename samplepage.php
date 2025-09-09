<?php
require 'ClassAutoLoad.php';

$ObjLayout->header();
$ObjLayout->nav($conf);
$ObjLayout->banner($conf);
$ObjLayout->form_content($conf, 'signup');
$ObjLayout->footer();