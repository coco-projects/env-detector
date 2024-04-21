<?php

    namespace Coco\envDetector\ip2Region;

class Channel1 extends Ip2RegionAbstract
{
    public function getRegion(string $ip): array
    {
        $info = (new \Ip2Region())->memorySearch($ip);

        $t = explode('|', $info['region']);

        $result = [
            "ip"       => $ip,
            "country"  => $t[0],
            "province" => $t[2],
            "city"     => $t[3],
            "county"   => '',
            "isp"      => $t[4],
        ];

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
