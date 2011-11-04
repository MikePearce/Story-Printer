<?php

/*
* fooStack, CIUnit
* Copyright (c) 2008 Clemens
 Gruenberger
* Released under the MIT license, see:
* http://www.opensource.org/licenses/mit-license.php
*/

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'ModelsAllTests::main');
}

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once dirname(__FILE__).'/../CIUnit.php';
$files = CIUnit::files('/test.*\.php/', dirname(__FILE__), true);
foreach($files as $file){
    require_once $file;
}


class ModelsAllTests extends CIUnitTestSuite{

    public static function suite()
    {
        $files = CIUnit::files('/test.*\.php/', dirname(__FILE__));
        $suite = new PHPUnit_Framework_TestSuite('Model tests');
        foreach($files  as $file){
            $file = str_replace('.php', '', $file);
            $suite->addTestSuite($file);
        }
        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'ModelsAllTests::main') {
    ModelsAllTests::main();
}