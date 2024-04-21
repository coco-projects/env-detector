<?php

    declare(strict_types = 1);

    namespace Coco\envDetector\env;

class Access
{

    /*********************************************
     * shell
     *********************************************/

    public function isByShell(): bool
    {
        return PHP_SAPI == 'cli';
    }

    // alma9-v4-2-12-4
    public function getHostname(): ?string
    {
        return gethostname() ?? null;
    }

    // /bin/bash
    public function getShell(): ?string
    {
        return $_SERVER['SHELL'] ?? null;
    }

    // root
    public function getShellUser(): ?string
    {
        return $_SERVER['LOGNAME'] ?? null;
    }

    // Asia/Shanghai
    public function getServerTimezone(): ?string
    {
        return $_SERVER['TZ'] ?? null;
    }

    // /var/www/6025/new/coco-envDetector/examples
    public function getCwd(): ?string
    {
        return $_SERVER['PWD'] ?? null;
    }

    // en_US.UTF-8
    public function getLang(): ?string
    {
        return $_SERVER['LANG'] ?? null;
    }

    //
    public function getArgs(): array
    {
        return $_SERVER['argv'] ?? [];
    }

    /*********************************************
     * browser
     *********************************************/

    public function isByBrowser(): bool
    {
        return !empty($_SERVER['HTTP_USER_AGENT']);
    }

    // deve:6025
    public function getHost(): string
    {
        return ($_SERVER['HTTP_HOST']) ?? '';
    }

    // HTTP/1.1
    public function getProtocol(): string
    {
        return ($_SERVER['SERVER_PROTOCOL']) ?? '';
    }

    // application/json
    public function getContentType(): string
    {
        return ($_SERVER['CONTENT_TYPE']) ?? '';
    }

    //
    public function getContentLength(): string
    {
        return ($_SERVER['CONTENT_LENGTH']) ?? '';
    }

    // http
    public function getScheme(): string
    {
        if (!$this->isByBrowser()) {
            return '';
        }

        return $this->isHttps() ? 'https' : 'http';
    }

    // http://deve:6025
    public function getDomain(): string
    {
        if (!$this->isByBrowser()) {
            return '';
        }

        return $this->getScheme() . '://' . $this->getHost();
    }

    // sub
    public function getSubDomain(): string
    {
        if (!$this->isByBrowser()) {
            return '';
        }

        $host  = $_SERVER['HTTP_HOST'] ?? "";
        $parts = explode('.', $host);

        if (count($parts) >= 3) {
            return $parts[count($parts) - 3];
        } else {
            return '';
        }
    }

    // /new/coco-envDetector/examples/demo3.php?a=1
    // http://deve:6025/new/coco-envDetector/examples/demo3.php?a=1
    public function getUrl(bool $withDomain = false): string
    {

        if (!$this->isByBrowser()) {
            return '';
        }

        $url = '';

        if ($_SERVER['HTTP_X_REWRITE_URL'] ?? "") {
            $url = $_SERVER['HTTP_X_REWRITE_URL'];
        } elseif ($_SERVER['REQUEST_URI'] ?? "") {
            $url = $_SERVER['REQUEST_URI'];
        } elseif ($_SERVER['ORIG_PATH_INFO'] ?? "") {
            $url = $_SERVER['ORIG_PATH_INFO'] . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '');
        }

        return $withDomain ? $this->getDomain() . $url : $url;
    }

    // /new/coco-envDetector/examples/demo3.php
    // http://deve:6025/new/coco-envDetector/examples/demo3.php
    public function getBaseUrl(bool $withDomain = false): string
    {
        $fullUrl = $this->getUrl();
        $baseUrl = str_contains($fullUrl, '?') ? strstr($fullUrl, '?', true) : $fullUrl;

        return $withDomain ? $this->getDomain() . $baseUrl : $baseUrl;
    }

    // deve
    public function getHostWithOutPort(): string
    {
        $t = explode(':', $this->getHost());

        return $t[0];
    }

    // GET
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? '';
    }

    // array
    public function getQuery(): array
    {
        return $_GET;
    }

    // array
    public function getPostData(): array
    {
        return $_POST;
    }

    // string
    public function getInputRaw(): string|bool
    {
        return file_get_contents('php://input');
    }

    // nginx
    public function getWebServer(): string
    {
        $s = explode('/', $_SERVER['SERVER_SOFTWARE'] ?? '');

        return $s[0] ?? '';
    }

    // 1.20.1
    public function getWebServerVersion(): string
    {
        $s = explode('/', $_SERVER['SERVER_SOFTWARE'] ?? '');

        return $s[1] ?? '';
    }

    // 6025
    public function getServerPort(): string
    {
        return $_SERVER['SERVER_PORT'] ?? '80';
    }

    // 2320
    public function getClientPort(): string
    {
        return $_SERVER['REMOTE_PORT'] ?? '';
    }

    public function isPost(): bool
    {
        return $this->getMethod() == 'POST';
    }

    public function isGet(): bool
    {
        return $this->getMethod() == 'GET';
    }

    public function isPut(): bool
    {
        return $this->getMethod() == 'PUT';
    }

    public function isDelete(): bool
    {
        return $this->getMethod() == 'DELETE';
    }

    public function isHead(): bool
    {
        return $this->getMethod() == 'HEAD';
    }

    public function isPatch(): bool
    {
        return $this->getMethod() == 'PATCH';
    }

    public function isOptions(): bool
    {
        return $this->getMethod() == 'OPTIONS';
    }

    public function isCgi(): bool
    {
        return str_starts_with(PHP_SAPI, 'cgi');
    }

    public function isHttps(): bool
    {
        if (in_array(strtolower($_SERVER['HTTPS'] ?? ''), [
            '1',
            'on',
        ])) {
            return true;
        } elseif ('https' == ($_SERVER['REQUEST_SCHEME'] ?? '')) {
            return true;
        } elseif ('443' == ($_SERVER['SERVER_PORT'] ?? '')) {
            return true;
        } elseif ('https' == ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) {
            return true;
        }

        return false;
    }

    public function isWebsocket(): bool
    {
        return (isset($_SERVER['HTTP_CONNECTION']) && str_contains($_SERVER['HTTP_CONNECTION'], 'Upgrade') && isset($_SERVER['HTTP_UPGRADE']) && strtolower($_SERVER['HTTP_UPGRADE']) == 'websocket');
    }

    public function isAjax(): bool
    {
        return strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? "") == 'xmlhttprequest';
    }

    public function isWantsJson(): bool
    {
        return $this->isAjax() or (str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json'));
    }

    public function isInnerNetwork(): bool
    {
        $remoteAddr = $_SERVER['REMOTE_ADDR'] ?? null;

        if ($remoteAddr) {
            if (str_starts_with($remoteAddr, '127.')) {
                // 如果是本地回环地址，则属于本地网络
                return true;
            } elseif (str_starts_with($remoteAddr, '192.168.')) {
                // 如果是以 '192.168.' 开头的地址，则属于内网
                return true;
            } elseif (str_starts_with($remoteAddr, '10.')) {
                // 如果是以 '10.' 开头的地址，则属于内网
                return true;
            } elseif (str_starts_with($remoteAddr, '172.')) {
                // 如果是以 '172.' 开头且第二个字段在 16-31 之间的地址，则属于内网
                $secondOctet = intval(explode('.', $remoteAddr)[1]);
                if ($secondOctet >= 16 && $secondOctet <= 31) {
                    return true;
                }
            }
        }

        // 如果不是以上情况，则认为是公网
        return false;
    }


    /*********************************************
     * both
     *********************************************/
    // apache
    public function getRunUser(): string
    {
        return $_SERVER['USER'];
    }

    // 1713536057
    public function getRequestTime(): int
    {
        return $_SERVER['REQUEST_TIME'];
    }

    // mixed
    public function getHeader(string $header): string
    {
        return $_SERVER[$header] ?? '';
    }
}
