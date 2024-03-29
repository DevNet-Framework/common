<?php

/**
 * @author      Mohammed Moussaoui
 * @license     MIT license. For more license information, see the LICENSE file in the root directory.
 * @link        https://github.com/DevNet-Framework
 */

namespace DevNet\Common\Logging;

interface ILoggerFactory
{
    public function addProvider(ILoggerProvider $provider): void;

    public function createLogger(string $category): ILogger;
}
