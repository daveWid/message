<?php

// Setup PSR-0 Autoloading
include "classes".DIRECTORY_SEPARATOR."SplClassLoader.php";

$classpath = realpath(__DIR__.DIRECTORY_SEPARATOR."..").DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR;
$loader = new SplClassLoader("Message", $classpath);
$loader->register();

// Load up the NativeSession class used in the testing
include "classes".DIRECTORY_SEPARATOR."NativeSession.php";
