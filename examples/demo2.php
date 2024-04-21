<?php

    use Coco\envDetector\Factory;

    require '../vendor/autoload.php';

//    $env = Factory::getIns(new \Coco\envDetector\ip2Region\Channel3('a48bee79df07a-'));
    $env = Factory::getIns(new \Coco\envDetector\ip2Region\Channel1());

    echo 'getPublicIp' . PHP_EOL;
    var_export($env->server->getPublicIp());
    echo PHP_EOL . PHP_EOL;

    echo 'getIpRegion' . PHP_EOL;
    var_export($env->server->getIpRegion());
    echo PHP_EOL . PHP_EOL;

    echo 'getInnerIp' . PHP_EOL;
    var_export($env->server->getInnerIp());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsType' . PHP_EOL;
    var_export($env->server->getOsType());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsRelease' . PHP_EOL;
    var_export($env->server->getOsRelease());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsKernelVersion' . PHP_EOL;
    var_export($env->server->getOsKernelVersion());
    echo PHP_EOL . PHP_EOL;

    echo 'getArchitecture' . PHP_EOL;
    var_export($env->server->getArchitecture());
    echo PHP_EOL . PHP_EOL;

    echo 'getHostname' . PHP_EOL;
    var_export($env->server->getHostname());
    echo PHP_EOL . PHP_EOL;

    echo 'getCpuModel' . PHP_EOL;
    var_export($env->server->getCpuModel());
    echo PHP_EOL . PHP_EOL;

    echo 'getCpuCores' . PHP_EOL;
    var_export($env->server->getCpuCores());
    echo PHP_EOL . PHP_EOL;

    echo 'getTotalMem' . PHP_EOL;
    var_export($env->server->getTotalMem());
    echo PHP_EOL . PHP_EOL;

    echo 'getDiskTotal' . PHP_EOL;
    var_export($env->server->getDiskTotal());
    echo PHP_EOL . PHP_EOL;

    echo 'getDiskUsage' . PHP_EOL;
    var_export($env->server->getDiskUsage());
    echo PHP_EOL . PHP_EOL;

    echo 'getDiskFree' . PHP_EOL;
    var_export($env->server->getDiskFree());
    echo PHP_EOL . PHP_EOL;

    echo 'getServerName' . PHP_EOL;
    var_export($env->server->getServerName());
    echo PHP_EOL . PHP_EOL;

    echo 'getServerStartTime' . PHP_EOL;
    var_export($env->server->getServerStartTime());
    echo PHP_EOL . PHP_EOL;

    echo 'getServerUpTime' . PHP_EOL;
    var_export($env->server->getServerUpTime());
    echo PHP_EOL . PHP_EOL;

    echo 'getServerUpTimeSeconds' . PHP_EOL;
    var_export($env->server->getServerUpTimeSeconds());
    echo PHP_EOL . PHP_EOL;

    echo 'getLinuxDistro' . PHP_EOL;
    var_export($env->server->getLinuxDistro());
    echo PHP_EOL . PHP_EOL;

