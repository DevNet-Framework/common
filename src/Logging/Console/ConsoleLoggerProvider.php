<?php

/**
 * @author      Mohammed Moussaoui
 * @license     MIT license. For more license information, see the LICENSE file in the root directory.
 * @link        https://github.com/DevNet-Framework
 */

namespace DevNet\Common\Logging\Console;

use DevNet\Common\Logging\ILogger;
use DevNet\Common\Logging\ILoggerProvider;

class ConsoleLoggerProvider implements ILoggerProvider
{
    public function createLogger(string $category): ILogger
    {
        return new ConsoleLogger($category);
    }
}
