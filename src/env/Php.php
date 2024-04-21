<?php

    declare(strict_types = 1);

    namespace Coco\envDetector\env;

    use STS\Phpinfo\Info;
    use STS\Phpinfo\Result;

class Php
{
    protected Result $phpinfo;
    protected array  $modules;

    public function __construct()
    {
        $this->phpinfo = Info::capture();
        $this->modules = $this->initModules();
    }

    //80127
    public function getVersionId()
    {
        return PHP_VERSION_ID;
    }

    // 8.2.0
    public function getVersion(): string
    {
        return $this->phpinfo->version();
    }

    public function getModules(): array
    {
        return $this->modules;
    }

    public function getLoadedExtensions(): array
    {
        return get_loaded_extensions();
    }

    protected function initModules(): array
    {
        $modules = [];
        foreach ($this->phpinfo->modules() as $k => $module) {
            $name = $module->name();

            if (!isset($modules[$name])) {
                $modules[$name] = [];
            }

            foreach ($module->configs() as $config) {
                $modules[$name][$config->name()]['local'] = $config->value();

                if ($config->hasMasterValue()) {
                    $modules[$name][$config->name()]['master'] = $config->masterValue();
                } else {
                    $modules[$name][$config->name()]['master'] = null;
                }
            }
        }

        return $modules;
    }
}
