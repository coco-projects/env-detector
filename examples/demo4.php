<?php

    use Coco\envDetector\Factory;

    require '../vendor/autoload.php';

//    $env = Factory::getIns(new \Coco\envDetector\ip2Region\Channel3('a48bee79df07af'));
    $env = Factory::getIns(new \Coco\envDetector\ip2Region\Channel1());

    echo 'getVersion' . PHP_EOL;
    var_export($env->php->getVersion());
    echo PHP_EOL . PHP_EOL;

    echo 'getVersionId' . PHP_EOL;
    var_export($env->php->getVersionId());
    echo PHP_EOL . PHP_EOL;

    echo 'getLoadedExtensions' . PHP_EOL;
    var_export($env->php->getLoadedExtensions());
    echo PHP_EOL . PHP_EOL;

    echo 'getModules' . PHP_EOL;
    print_r($env->php->getModules());
    echo PHP_EOL . PHP_EOL;

