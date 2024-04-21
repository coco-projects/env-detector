<?php

    namespace Coco\envDetector\ip2Region;

abstract class Ip2RegionAbstract
{
    abstract public function getRegion(string $ip): array;

    abstract public function getRegionAsString(string $ip): string;
}
