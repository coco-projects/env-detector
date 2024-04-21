<?php

    use Coco\envDetector\Factory;

    require '../vendor/autoload.php';

    $env = Factory::getIns(new \Coco\envDetector\ip2Region\Channel3('a48bee79df07af'));
    $env = Factory::getIns(new \Coco\envDetector\ip2Region\Channel2());

    echo 'getIp' . PHP_EOL;
    var_export($env->client->getIp());
    echo PHP_EOL . PHP_EOL;

    echo 'getIps' . PHP_EOL;
    var_export($env->client->getIps());
    echo PHP_EOL . PHP_EOL;

    echo 'getIpRegion' . PHP_EOL;
    var_export($env->client->getIpRegion());
    echo PHP_EOL . PHP_EOL;

    echo 'getBotInfo' . PHP_EOL;
    var_export($env->client->getBotInfo());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsInfo' . PHP_EOL;
    var_export($env->client->getOsInfo());
    echo PHP_EOL . PHP_EOL;

    echo 'getClientInfo' . PHP_EOL;
    var_export($env->client->getClientInfo());
    echo PHP_EOL . PHP_EOL;

    echo 'getClientVersion' . PHP_EOL;
    var_export($env->client->getClientVersion());
    echo PHP_EOL . PHP_EOL;

    echo 'getClientName' . PHP_EOL;
    var_export($env->client->getClientName());
    echo PHP_EOL . PHP_EOL;

    echo 'getClientType' . PHP_EOL;
    var_export($env->client->getClientType());
    echo PHP_EOL . PHP_EOL;

    echo 'getBrowserFamily' . PHP_EOL;
    var_export($env->client->getBrowserFamily());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsName' . PHP_EOL;
    var_export($env->client->getOsName());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsShortName' . PHP_EOL;
    var_export($env->client->getOsShortName());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsVersion' . PHP_EOL;
    var_export($env->client->getOsVersion());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsPlatform' . PHP_EOL;
    var_export($env->client->getOsPlatform());
    echo PHP_EOL . PHP_EOL;

    echo 'getOsFamily' . PHP_EOL;
    var_export($env->client->getOsFamily());
    echo PHP_EOL . PHP_EOL;

    echo 'getDeviceName' . PHP_EOL;
    var_export($env->client->getDeviceName());
    echo PHP_EOL . PHP_EOL;

    echo 'getBrandName' . PHP_EOL;
    var_export($env->client->getBrandName());
    echo PHP_EOL . PHP_EOL;

    echo 'getModel' . PHP_EOL;
    var_export($env->client->getModel());
    echo PHP_EOL . PHP_EOL;

    echo 'getUserAgent' . PHP_EOL;
    var_export($env->client->getUserAgent());
    echo PHP_EOL . PHP_EOL;

    echo 'isBrowser' . PHP_EOL;
    var_export($env->client->isBrowser());
    echo PHP_EOL . PHP_EOL;

    echo 'isBot' . PHP_EOL;
    var_export($env->client->isBot());
    echo PHP_EOL . PHP_EOL;

    echo 'isSmartphone' . PHP_EOL;
    var_export($env->client->isSmartphone());
    echo PHP_EOL . PHP_EOL;

    echo 'isFeaturePhone' . PHP_EOL;
    var_export($env->client->isFeaturePhone());
    echo PHP_EOL . PHP_EOL;

    echo 'isTablet' . PHP_EOL;
    var_export($env->client->isTablet());
    echo PHP_EOL . PHP_EOL;

    echo 'isPhablet' . PHP_EOL;
    var_export($env->client->isPhablet());
    echo PHP_EOL . PHP_EOL;

    echo 'isConsole' . PHP_EOL;
    var_export($env->client->isConsole());
    echo PHP_EOL . PHP_EOL;

    echo 'isPortableMediaPlayer' . PHP_EOL;
    var_export($env->client->isPortableMediaPlayer());
    echo PHP_EOL . PHP_EOL;

    echo 'isCarBrowser' . PHP_EOL;
    var_export($env->client->isCarBrowser());
    echo PHP_EOL . PHP_EOL;

    echo 'isTV' . PHP_EOL;
    var_export($env->client->isTV());
    echo PHP_EOL . PHP_EOL;

    echo 'isSmartDisplay' . PHP_EOL;
    var_export($env->client->isSmartDisplay());
    echo PHP_EOL . PHP_EOL;

    echo 'isSmartSpeaker' . PHP_EOL;
    var_export($env->client->isSmartSpeaker());
    echo PHP_EOL . PHP_EOL;

    echo 'isCamera' . PHP_EOL;
    var_export($env->client->isCamera());
    echo PHP_EOL . PHP_EOL;

    echo 'isWearable' . PHP_EOL;
    var_export($env->client->isWearable());
    echo PHP_EOL . PHP_EOL;

    echo 'isPeripheral' . PHP_EOL;
    var_export($env->client->isPeripheral());
    echo PHP_EOL . PHP_EOL;

    echo 'isFeedReader' . PHP_EOL;
    var_export($env->client->isFeedReader());
    echo PHP_EOL . PHP_EOL;

    echo 'isMobileApp' . PHP_EOL;
    var_export($env->client->isMobileApp());
    echo PHP_EOL . PHP_EOL;

    echo 'isMobile' . PHP_EOL;
    var_export($env->client->isMobile());
    echo PHP_EOL . PHP_EOL;

    echo 'isPIM' . PHP_EOL;
    var_export($env->client->isPIM());
    echo PHP_EOL . PHP_EOL;

    echo 'isLibrary' . PHP_EOL;
    var_export($env->client->isLibrary());
    echo PHP_EOL . PHP_EOL;

    echo 'isMediaPlayer' . PHP_EOL;
    var_export($env->client->isMediaPlayer());
    echo PHP_EOL . PHP_EOL;
