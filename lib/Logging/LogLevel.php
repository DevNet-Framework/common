<?php
/**
 * @author      Mohammed Moussaoui
 * @license     MIT license. For more license information, see the LICENSE file in the root directory.
 * @link        https://github.com/DevNet-Framework
 */

namespace DevNet\Common\Logging;

enum LogLevel: int
{
    /**
     * Logs that contain the most detailed messages.
     */
    case Trace = 0;

    /**
     * Logs that are used for interactive investigation during development.
     */
    case Debug = 1;

    /**
     * Logs that track the general flow of the application.
     */
    case Information = 2;

    /**
     * Logs that highlight the abnormal in the application flow, without stopping the execution.
     */
    case Warning = 3;

    /**
     * Logs that highlight when the current flow of execution is stopped due to a failure.
     */
    case Error = 4;

    /**
     * Logs that describe a system crash, or a catastrophic failure that requires immediate attention.
     */
    case Fatal = 5;

    /**
     * Logs that not used for writing log messages.
     */
    case None = 6;

}
