<?php

/**
 * @author      Mohammed Moussaoui
 * @license     MIT license. For more license information, see the LICENSE file in the root directory.
 * @link        https://github.com/DevNet-Framework
 */

namespace DevNet\Common\Logging;

use DevNet\Common\Logging\Console\ConsoleLoggerProvider;
use DevNet\Common\Logging\File\FileLoggerProvider;

class LoggerOptions
{
    private array $filters = [];
    private array $providers = [];

    public array $Filters { get => $this->filters; }
    public array $Providers { get => $this->providers; }
    public LogLevel $MinimumLevel { set => $this->addFilter('', $value); }

    public function setMinimumLevel(LogLevel $level): void
    {
        $this->addFilter('', $level);
    }

    public function addFilter(string $category, LogLevel $level): void
    {
        $this->filters[$category] = $level;
    }

    public function addProvider(ILoggerProvider $provider): void
    {
        $this->providers[$provider::class] = $provider;
    }

    public function addConsole(): void
    {
        $this->addProvider(new ConsoleLoggerProvider());
    }

    public function addFile(string $fileName): void
    {
        $this->addProvider(new FileLoggerProvider($fileName));
    }
}
