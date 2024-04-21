<?php

    namespace Coco\envDetector\ip2Region;

    use ipinfo\ipinfo\IPinfo;

class Channel3 extends Ip2RegionAbstract
{
    public function __construct(protected string $token)
    {
    }

    public function getRegion(string $ip): array
    {
        $file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . md5($ip) . '.json';

        if (!is_file($file)) {
            try {
                $client  = new IPinfo($this->token);
                $details = $client->getDetails($ip);
                file_put_contents($file, json_encode($details));
            } catch (\Exception $exception) {
                $details = "{}";
            }
        } else {
            $details = file_get_contents($file);
        }

        /*
ipinfo\ipinfo\Details Object
(
    [ip] => 114.37.224.23
    [hostname] => 114-37-224-23.dynamic-ip.hinet.net
    [city] => Taipei
    [region] => Taiwan
    [country] => TW
    [loc] => 25.0478,121.5319
    [org] => AS3462 Data Communication Business Group
    [timezone] => Asia/Taipei
    [country_name] => Taiwan
    [latitude] => 25.0478
    [longitude] => 121.5319
    [all] => Array
        (
            [ip] => 114.37.224.23
            [hostname] => 114-37-224-23.dynamic-ip.hinet.net
            [city] => Taipei
            [region] => Taiwan
            [country] => TW
            [loc] => 25.0478,121.5319
            [org] => AS3462 Data Communication Business Group
            [timezone] => Asia/Taipei
            [country_name] => Taiwan
            [latitude] => 25.0478
            [longitude] => 121.5319
        )

)

         */

        $details = json_decode($details);
        $result  = [
            "ip"       => $ip,
            "country"  => $details->country_name ?? '',
            "province" => $details->region ?? '',
            "city"     => $details->city ?? '',
            "county"   => '',
            "isp"      => $details->org ?? '',
            "loc"      => $details->loc ?? '',
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
