<?php

use Multiton\FileSave;
use StaticFabric\StaticFactory;

use FabricMethod\FileSaveFactory;
use FabricMethod\MySqlSaveFactory;

require 'functions.php';
spl_autoload_register('project_autoload');

//Multiton
/*$file = FileSave::getInstance('user-logs');
$file->save(__DIR__);

$file = FileSave::getInstance('system-logs');
$file->

//Static Fabric
/*$obj = StaticFactory::create('save');
$obj->save();*/

//Fabric Method
/*$factory = new FileSaveFactory('testFile.txt');
$factory = new MySqlSaveFactory('192.168.44.25', 'root', '', 'patterns');
$factory->createSaver()->save('Hello world!');*/

