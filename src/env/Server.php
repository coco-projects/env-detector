<?php

    declare(strict_types = 1);

    namespace Coco\envDetector\env;

    use Coco\envDetector\ip2Region\Ip2RegionAbstract;
    use Typomedia\Sysinfo\Provider\AbstractProvider;
    use Typomedia\Sysinfo\SysinfoFactory;

class Server
{
    public Ip2RegionAbstract $ip2Region;
    public AbstractProvider  $sysinfo;

    public function __construct(Ip2RegionAbstract $ip2Region)
    {
        $this->ip2Region = $ip2Region;
        $this->sysinfo   = SysinfoFactory::create();
    }

    public function getPublicIp(): ?string
    {
        return $this->getPublicIpInfo()['ip_addr'] ?? null;
    }

    public function getIpRegion(): string
    {
        if (is_string($ip = $this->getPublicIp())) {
            return $this->ip2Region->getRegionAsString($ip);
        }

        return '';
    }

    public function getInnerIp()
    {
        return $_SERVER['SERVER_ADDR'] ?? null;
    }

    public function getOsType(): string
    {
        return $this->sysinfo->getOsType();
    }

    public function getOsRelease(): string
    {
        return $this->sysinfo->getOsRelease();
    }

    public function getOsKernelVersion(): string
    {
        return $this->sysinfo->getOsKernelVersion();
    }

    public function getArchitecture(): string
    {
        return $this->sysinfo->getArchitecture();
    }

    public function getHostname(): string
    {
        return $this->sysinfo->getHostname();
    }

    public function getCpuModel(): string
    {
        return $this->sysinfo->getCpuModel();
    }

    public function getCpuCores()
    {
        return $this->sysinfo->getCpuCores();
    }

    public function getTotalMem()
    {
        return $this->sysinfo->getTotalMem();
    }

    public function getDiskTotal()
    {
        return $this->sysinfo->getDiskTotal();
    }

    public function getDiskUsage()
    {
        return $this->sysinfo->getDiskUsage();
    }

    public function getDiskFree()
    {
        return $this->sysinfo->getDiskFree();
    }

    public function getServerName()
    {
        return $_SERVER['SERVER_NAME'] ?? null;
    }

    public function getServerStartTime(): ?string
    {
        $uptimeFile = '/proc/uptime';
        if (is_readable($uptimeFile)) {
            $uptime        = file_get_contents($uptimeFile);
            $uptimeSeconds = (int)explode(' ', $uptime)[0];
            $startTime     = time() - $uptimeSeconds;

            return date('Y-m-d H:i:s', $startTime);
        } else {
            return null;
        }
    }

    public function getServerUpTime(): string
    {
        $uptimeSeconds = $this->getServerUpTimeSeconds();
        if (!is_null($uptimeSeconds)) {
            return $this->formatSeconds($uptimeSeconds);
        }
    }

    public function getServerUpTimeSeconds(): ?int
    {
        $uptimeFile = '/proc/uptime';
        if (is_readable($uptimeFile)) {
            $uptime = file_get_contents($uptimeFile);

            return (int)explode(' ', $uptime)[0];
        } else {
            return null;
        }
    }

    public function getLinuxDistro()
    {
        // Check /etc/os-release file
        $osReleaseFile = '/etc/os-release';
        if (file_exists($osReleaseFile)) {
            $osInfo = parse_ini_file($osReleaseFile);
            if (isset($osInfo['ID'])) {
                return $osInfo['ID'];
            }
        }

        // Check lsb_release command
        $lsbOutput = shell_exec('lsb_release -si');
        if ($lsbOutput !== null) {
            return trim($lsbOutput);
        }

        // Check /etc/issue file
        $issueFile = '/etc/issue';
        if (file_exists($issueFile)) {
            $issueContent = file_get_contents($issueFile);
            if (str_contains($issueContent, 'Ubuntu')) {
                return 'Ubuntu';
            } elseif (str_contains($issueContent, 'Debian')) {
                return 'Debian';
            } elseif (str_contains($issueContent, 'CentOS')) {
                return 'CentOS';
            } elseif (str_contains($issueContent, 'Fedora')) {
                return 'Fedora';
            }
        }

        // If none of the methods above work, return Unknown
        return 'Unknown';
    }

    private function formatSeconds($seconds): string
    {
        $days    = floor($seconds / (60 * 60 * 24));
        $hours   = floor(($seconds % (60 * 60 * 24)) / (60 * 60));
        $minutes = floor(($seconds % (60 * 60)) / 60);
        $seconds = $seconds % 60;

        $uptimeString = '';
        if ($days > 0) {
            $uptimeString .= $days . " days ";
        }
        if ($hours > 0) {
            $uptimeString .= $hours . " hours ";
        }
        if ($minutes > 0) {
            $uptimeString .= $minutes . " minutes ";
        }
        if ($seconds > 0) {
            $uptimeString .= $seconds . " seconds ";
        }

        return trim($uptimeString);
    }

    private function getPublicIpInfo(bool $refresh = false)
    {
        $ipInfoFile = sys_get_temp_dir() . DIRECTORY_SEPARATOR . md5(__FILE__) . '.json';

        if (!is_file($ipInfoFile) or $refresh) {
            try {
                $ipInfo = file_get_contents('https://ifconfig.me/all.json');
                file_put_contents($ipInfoFile, $ipInfo);
            } catch (\Exception $exception) {
                $ipInfo = "{}";
            }
        } else {
            $ipInfo = file_get_contents($ipInfoFile);
        }

        return json_decode($ipInfo, true);
    }
}
