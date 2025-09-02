<?php
//Created class
class HelloWorld
{
    public function greet()
    {
        return "<h1>Hello,BBIT Community!</h1>";
    }
    public function today()
    {
        return "<p>Today is" . date("1") . "</p>";
    }
}

//Create an instance of the class
$hello = new HelloWorld();

//Call the greet method
print $hello->greet();

//Call the today method
print $hello->today();