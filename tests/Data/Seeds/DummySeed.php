<?php declare(strict_types=1);

namespace Limoncello\Tests\Application\Data\Seeds;

/**
 * Copyright 2015-2020 info@neomerx.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Limoncello\Contracts\Data\SeedInterface;
use Psr\Container\ContainerInterface;

/**
 * @package Limoncello\Tests\Application
 */
class DummySeed implements SeedInterface
{
    /**
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * @inheritdoc
     */
    public function init(ContainerInterface $container): SeedInterface
    {
        $this->container = $container;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function run(): void
    {
    }
}
