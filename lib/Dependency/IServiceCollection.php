<?php

/**
 * @author      Mohammed Moussaoui
 * @license     MIT license. For more license information, see the LICENSE file in the root directory.
 * @link        https://github.com/DevNet-Framework
 */

namespace DevNet\Common\Dependency;

use IteratorAggregate;

interface IServiceCollection extends IteratorAggregate
{
    public function add(ServiceDescriptor $serviceDescriptor): void;
}
