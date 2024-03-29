<?php

/**
 * @author      Mohammed Moussaoui
 * @license     MIT license. For more license information, see the LICENSE file in the root directory.
 * @link        https://github.com/DevNet-Framework
 */

namespace DevNet\Common\Configuration;

class ConfigurationBuilder
{
    private ?string $basePath = null;
    private array $settings = [];

    public function __construct(array $settings = [])
    {
        $this->settings = $settings;
    }

    public function setBasePath(string $basePath): void
    {
        $this->basePath = $basePath;
    }

    public function addSetting(string $key, $value): void
    {
        $this->settings[$key] = $value;
    }

    public function addJsonFile(string $path): void
    {
        if ($this->basePath) {
            $path = $this->basePath . "/" . $path;
        }

        if (!file_exists($path)) {
            throw new \Exception("Not found file {$path}");
        }

        $settings = file_get_contents($path);
        $settings = json_decode($settings, true);
        $this->settings = array_merge($this->settings, $settings);
    }

    public function build(): IConfiguration
    {
        return new ConfigurationRoot($this->settings);
    }
}
