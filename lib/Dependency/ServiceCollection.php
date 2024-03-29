<?php

/**
 * @author      Mohammed Moussaoui
 * @license     MIT license. For more license information, see the LICENSE file in the root directory.
 * @link        https://github.com/DevNet-Framework
 */

namespace DevNet\Common\Dependency;

use DevNet\System\Exceptions\ArgumentException;
use DevNet\System\Exceptions\ClassException;
use DevNet\System\Exceptions\SystemException;
use DevNet\System\Exceptions\TypeException;
use DevNet\System\MethodTrait;
use ArrayIterator;
use Traversable;

class ServiceCollection implements IServiceCollection
{
    use MethodTrait;

    private array $services = [];

    public function add(ServiceDescriptor $serviceDescriptor): void
    {
        $this->services[$serviceDescriptor->ServiceType] = $serviceDescriptor;
    }

    public function addSingleton(string $serviceType, $service = null): void
    {
        try {
            $this->add(new ServiceDescriptor(1, $serviceType, $service));
        } catch (SystemException $exception) {
            if ($exception instanceof ClassException) {
                throw new ClassException($exception->getMessage(), 0, 1);
            } else if ($exception instanceof TypeException) {
                throw new TypeException($exception->getMessage(), 0, 1);
            } else if ($exception instanceof ArgumentException) {
                throw new ArgumentException(static::class . "::addSingleton() The argument #2 must be of type string, object or a closure", 0, 1);
            }

            throw $exception;
        }
    }

    public function addTransient(string $serviceType, $service = null): void
    {
        try {
            $this->add(new ServiceDescriptor(2, $serviceType, $service));
        } catch (SystemException $exception) {
            if ($exception instanceof ClassException) {
                throw new ClassException($exception->getMessage(), 0, 1);
            } else if ($exception instanceof TypeException) {
                throw new TypeException($exception->getMessage(), 0, 1);
            } else if ($exception instanceof ArgumentException) {
                throw new ArgumentException(static::class . "::addTransient() The argument #2 must be of type string, object or a closure", 0, 1);
            }

            throw $exception;
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->services);
    }

    public function clear(): void
    {
        $this->services = [];
    }
}
