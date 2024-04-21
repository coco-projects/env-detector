<?php

    declare(strict_types = 1);

    namespace Coco\envDetector;

    use Coco\envDetector\env\Access;
    use Coco\envDetector\env\Client;
    use Coco\envDetector\env\Php;
    use Coco\envDetector\env\Server;
    use Coco\envDetector\ip2Region\Ip2RegionAbstract;

class Factory
{
    public Server $server;
    public Access $access;
    public Client $client;
    public Php    $php;

    public static function getIns(Ip2RegionAbstract $ip2Region): static
    {
        return new static($ip2Region);
    }

    public function __construct(Ip2RegionAbstract $ip2Region)
    {
        $this->server = new Server($ip2Region);
        $this->client = new Client($ip2Region);
        $this->access = new Access();
        $this->php    = new Php();
    }
}
