<?php

include_once("class.pdofactory.php");
include_once("abstract.databoundobject.php");
include_once("class.logdata.php");

$connectionString = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";


$urlData = parse_url($connectionString);

var_dump($urlData);

if (!isset($urlData['scheme'])) {
  throw new Exception("Invalid scheme connection.\n");
}

$fileName = 'Logger/class.' . $urlData['scheme'] . 'LoggerBackend.php';

include_once($fileName);

$className = $urlData['scheme'] . 'LoggerBackend';

print "Class Name: " . $className . "\n";

if (!class_exists($className)) {
  throw new Exception("No loggind bakend available for " . $urlData['scheme']);
}

$log = $className::getInstance();
$log->logMessage('Same important text to register.', $className::DEBUG);
$log->logMessage('Same important text to register2.', $className::INFO);
$log->logMessage('Same important text to register3.', $className::WARNING);

print "Logger " . $urlData['scheme'] . " created. [END]\n";