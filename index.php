<?php
//Include the ClassAutoLoad Method
require_once 'ClassAutoLoad.php';

//Display the header
$layout->header();

//Call the greet method
print $hello->greet();

//Call the today method
print $hello->today();

//Display the signup form
print $forms->signup();

$layout->footer();