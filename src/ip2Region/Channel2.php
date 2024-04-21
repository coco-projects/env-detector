<?php

    namespace Coco\envDetector\ip2Region;

    use itbdw\Ip\IpLocation;

class Channel2 extends Ip2RegionAbstract
{
    public function getRegion(string $ip): array
    {
        $result = IpLocation::getLocation($ip);

        return $result;
    }

    public function getRegionAsString(string $ip): string
    {
        $info = $this->getRegion($ip);

        return implode('', [
            $info['country'] . '/',
            $info['province'] . '/',
            $info['city'] . '/',
            $info['county'] . '/',
            '[' . $info['isp'] . ']',
        ]);
    }
}
