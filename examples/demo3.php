<?php

    use Coco\envDetector\Factory;

    require '../vendor/autoload.php';

    $env = Factory::getIns(new \Coco\envDetector\ip2Region\Channel2());

    /*********************************************
     * shell
     *********************************************/

    echo 'isByShell' . PHP_EOL;
    var_export($env->access->isByShell());
    echo PHP_EOL . PHP_EOL;

    echo 'getHostname' . PHP_EOL;
    var_export($env->access->getHostname());
    echo PHP_EOL . PHP_EOL;

    echo 'getShell' . PHP_EOL;
    var_export($env->access->getShell());
    echo PHP_EOL . PHP_EOL;

    echo 'getShellUser' . PHP_EOL;
    var_export($env->access->getShellUser());
    echo PHP_EOL . PHP_EOL;

    echo 'getServerTimezone' . PHP_EOL;
    var_export($env->access->getServerTimezone());
    echo PHP_EOL . PHP_EOL;

    echo 'getCwd' . PHP_EOL;
    var_export($env->access->getCwd());
    echo PHP_EOL . PHP_EOL;

    echo 'getLang' . PHP_EOL;
    var_export($env->access->getLang());
    echo PHP_EOL . PHP_EOL;

    echo 'getArgs' . PHP_EOL;
    var_export($env->access->getArgs());
    echo PHP_EOL . PHP_EOL;

    /*********************************************
     * browser
     *********************************************/

    echo 'isByBrowser' . PHP_EOL;
    var_export($env->access->isByBrowser());
    echo PHP_EOL . PHP_EOL;

    echo 'getHost' . PHP_EOL;
    var_export($env->access->getHost());
    echo PHP_EOL . PHP_EOL;

    echo 'getProtocol' . PHP_EOL;
    var_export($env->access->getProtocol());
    echo PHP_EOL . PHP_EOL;

    echo 'getContentType' . PHP_EOL;
    var_export($env->access->getContentType());
    echo PHP_EOL . PHP_EOL;

    echo 'getContentLength' . PHP_EOL;
    var_export($env->access->getContentLength());
    echo PHP_EOL . PHP_EOL;

    echo 'getScheme' . PHP_EOL;
    var_export($env->access->getScheme());
    echo PHP_EOL . PHP_EOL;

    echo 'getDomain' . PHP_EOL;
    var_export($env->access->getDomain());
    echo PHP_EOL . PHP_EOL;

    echo 'getSubDomain' . PHP_EOL;
    var_export($env->access->getSubDomain());
    echo PHP_EOL . PHP_EOL;

    echo 'getUrl' . PHP_EOL;
    var_export($env->access->getUrl());
    echo PHP_EOL . PHP_EOL;

    echo 'getUrl-true' . PHP_EOL;
    var_export($env->access->getUrl(true));
    echo PHP_EOL . PHP_EOL;

    echo 'getBaseUrl' . PHP_EOL;
    var_export($env->access->getBaseUrl());
    echo PHP_EOL . PHP_EOL;

    echo 'getBaseUrl-true' . PHP_EOL;
    var_export($env->access->getBaseUrl(true));
    echo PHP_EOL . PHP_EOL;

    echo 'getHostWithOutPort' . PHP_EOL;
    var_export($env->access->getHostWithOutPort());
    echo PHP_EOL . PHP_EOL;

    echo 'getMethod' . PHP_EOL;
    var_export($env->access->getMethod());
    echo PHP_EOL . PHP_EOL;

    echo 'getQuery' . PHP_EOL;
    var_export($env->access->getQuery());
    echo PHP_EOL . PHP_EOL;

    echo 'getPostData' . PHP_EOL;
    var_export($env->access->getPostData());
    echo PHP_EOL . PHP_EOL;

    echo 'getInputRaw' . PHP_EOL;
    var_export($env->access->getInputRaw());
    echo PHP_EOL . PHP_EOL;

    echo 'getWebServer' . PHP_EOL;
    var_export($env->access->getWebServer());
    echo PHP_EOL . PHP_EOL;

    echo 'getWebServerVersion' . PHP_EOL;
    var_export($env->access->getWebServerVersion());
    echo PHP_EOL . PHP_EOL;

    echo 'getServerPort' . PHP_EOL;
    var_export($env->access->getServerPort());
    echo PHP_EOL . PHP_EOL;

    echo 'getClientPort' . PHP_EOL;
    var_export($env->access->getClientPort());
    echo PHP_EOL . PHP_EOL;

    echo 'isPost' . PHP_EOL;
    var_export($env->access->isPost());
    echo PHP_EOL . PHP_EOL;

    echo 'isGet' . PHP_EOL;
    var_export($env->access->isGet());
    echo PHP_EOL . PHP_EOL;

    echo 'isPut' . PHP_EOL;
    var_export($env->access->isPut());
    echo PHP_EOL . PHP_EOL;

    echo 'isDelete' . PHP_EOL;
    var_export($env->access->isDelete());
    echo PHP_EOL . PHP_EOL;

    echo 'isHead' . PHP_EOL;
    var_export($env->access->isHead());
    echo PHP_EOL . PHP_EOL;

    echo 'isPatch' . PHP_EOL;
    var_export($env->access->isPatch());
    echo PHP_EOL . PHP_EOL;

    echo 'isOptions' . PHP_EOL;
    var_export($env->access->isOptions());
    echo PHP_EOL . PHP_EOL;

    echo 'isCgi' . PHP_EOL;
    var_export($env->access->isCgi());
    echo PHP_EOL . PHP_EOL;

    echo 'isHttps' . PHP_EOL;
    var_export($env->access->isHttps());
    echo PHP_EOL . PHP_EOL;

    echo 'isWebsocket' . PHP_EOL;
    var_export($env->access->isWebsocket());
    echo PHP_EOL . PHP_EOL;

    echo 'isAjax' . PHP_EOL;
    var_export($env->access->isAjax());
    echo PHP_EOL . PHP_EOL;

    echo 'isWantsJson' . PHP_EOL;
    var_export($env->access->isWantsJson());
    echo PHP_EOL . PHP_EOL;

    echo 'isInnerNetwork' . PHP_EOL;
    var_export($env->access->isInnerNetwork());
    echo PHP_EOL . PHP_EOL;

    /*********************************************
     * both
     *********************************************/

    echo 'getRunUser' . PHP_EOL;
    var_export($env->access->getRunUser());
    echo PHP_EOL . PHP_EOL;

    echo 'getRequestTime' . PHP_EOL;
    var_export($env->access->getRequestTime());
    echo PHP_EOL . PHP_EOL;

    echo 'getHeader' . PHP_EOL;
    var_export($env->access->getHeader('DOCUMENT_ROOT'));
    echo PHP_EOL . PHP_EOL;
