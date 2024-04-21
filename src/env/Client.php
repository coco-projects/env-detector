<?php

    declare(strict_types = 1);

    namespace Coco\envDetector\env;

    use Detection\MobileDetect;
    use Coco\envDetector\ip2Region\Ip2RegionAbstract;
    use Vectorface\Whip\Whip;
    use DeviceDetector\ClientHints;
    use DeviceDetector\DeviceDetector;

class Client
{
    public Ip2RegionAbstract $ip2Region;
    public DeviceDetector    $deviceDetector;
    public ?array            $botInfo    = null;
    public ?array            $clientInfo = null;
    public ?array            $osInfo     = null;

    public function __construct(Ip2RegionAbstract $ip2Region)
    {
        $this->ip2Region      = $ip2Region;
        $userAgent            = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $clientHints          = ClientHints::factory($_SERVER);
        $this->deviceDetector = new DeviceDetector($userAgent, $clientHints);
        $this->deviceDetector->parse();
        if ($this->deviceDetector->isBot()) {
            // handle bots,spiders,crawlers,...
            $this->botInfo = $this->deviceDetector->getBot();
        } else {
            // holds information about browser, feed reader, media player, ...
            $this->clientInfo = $this->deviceDetector->getClient();
            $this->osInfo     = $this->deviceDetector->getOs();
        }
    }

    public function getIps(): array
    {
        return [
            "cloudflare"  => (new Whip(Whip::CLOUDFLARE_HEADERS))->getValidIpAddress(),
            "remote_addr" => (new Whip(Whip::REMOTE_ADDR))->getValidIpAddress(),
            "proxy"       => (new Whip(Whip::PROXY_HEADERS))->getValidIpAddress(),
            "incapsula"   => (new Whip(Whip::INCAPSULA_HEADERS))->getValidIpAddress(),
        ];
    }

    public function getIp(): ?string
    {
        if (!$ip = (new Whip())->getValidIpAddress()) {
            $ip = null;
        }

        return $ip;
    }

    public function getIpRegion(): string
    {
        if (is_string($ip = $this->getIp())) {
            return $this->ip2Region->getRegionAsString($ip);
        }

        return '';
    }

    public function getBotInfo(): ?array
    {
        return $this->botInfo;
    }

    public function getOsInfo(): ?array
    {
        return $this->osInfo;
    }

    public function getClientInfo(): ?array
    {
        return $this->clientInfo;
    }

    public function getClientVersion()
    {
        return $this->clientInfo['version'];
    }

    public function getClientName()
    {
        return $this->clientInfo['name'];
    }

    public function getClientType()
    {
        return $this->clientInfo['type'];
    }

    public function getBrowserFamily()
    {
        return $this->clientInfo['family'] ?? '';
    }

    public function getOsName()
    {
        return $this->osInfo['name'];
    }

    public function getOsShortName()
    {
        return $this->osInfo['short_name'];
    }

    public function getOsVersion()
    {
        return $this->osInfo['version'];
    }

    public function getOsPlatform()
    {
        return $this->osInfo['platform'];
    }

    public function getOsFamily()
    {
        return $this->osInfo['family'];
    }

    public function getDeviceName(): string
    {
        return $this->deviceDetector->getDeviceName();
    }

    public function getBrandName(): string
    {
        return $this->deviceDetector->getBrandName();
    }

    public function getModel(): string
    {
        return $this->deviceDetector->getModel();
    }

    public function getUserAgent(): string
    {
        return $this->deviceDetector->getUserAgent();
    }

    public function isBrowser(): bool
    {
        return $this->deviceDetector->isBrowser();
    }

    public function isBot(): bool
    {
        return $this->deviceDetector->isBot();
    }

    public function isSmartphone(): bool
    {
        return $this->deviceDetector->isSmartphone();
    }

    public function isFeaturePhone(): bool
    {
        return $this->deviceDetector->isFeaturePhone();
    }

    public function isTablet(): bool
    {
        return $this->deviceDetector->isTablet();
    }

    public function isPhablet(): bool
    {
        return $this->deviceDetector->isPhablet();
    }

    public function isConsole(): bool
    {
        return $this->deviceDetector->isConsole();
    }

    public function isPortableMediaPlayer(): bool
    {
        return $this->deviceDetector->isPortableMediaPlayer();
    }

    public function isCarBrowser(): bool
    {
        return $this->deviceDetector->isCarBrowser();
    }

    public function isTV(): bool
    {
        return $this->deviceDetector->isTV();
    }

    public function isSmartDisplay(): bool
    {
        return $this->deviceDetector->isSmartDisplay();
    }

    public function isSmartSpeaker(): bool
    {
        return $this->deviceDetector->isSmartSpeaker();
    }

    public function isCamera(): bool
    {
        return $this->deviceDetector->isCamera();
    }

    public function isWearable(): bool
    {
        return $this->deviceDetector->isWearable();
    }

    public function isPeripheral(): bool
    {
        return $this->deviceDetector->isPeripheral();
    }

    public function isFeedReader(): bool
    {
        return $this->deviceDetector->isFeedReader();
    }

    public function isMobileApp(): bool
    {
        return $this->deviceDetector->isMobileApp();
    }

    public function isMobile(): bool
    {
        return (new MobileDetect())->isMobile();
    }

    public function isPIM(): bool
    {
        return $this->deviceDetector->isPIM();
    }

    public function isLibrary(): bool
    {
        return $this->deviceDetector->isLibrary();
    }

    public function isMediaPlayer(): bool
    {
        return $this->deviceDetector->isMediaPlayer();
    }
}
