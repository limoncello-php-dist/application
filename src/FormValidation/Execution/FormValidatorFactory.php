<?php namespace Limoncello\Application\FormValidation\Execution;

/**
 * Copyright 2015-2017 info@neomerx.com
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

use Limoncello\Application\Contracts\Validation\FormValidatorFactoryInterface;
use Limoncello\Application\Contracts\Validation\FormValidatorInterface;
use Limoncello\Application\FormValidation\Validator;
use Limoncello\Application\Packages\FormValidation\FormValidationSettings as S;
use Limoncello\Container\Traits\HasContainerTrait;
use Limoncello\Contracts\Settings\SettingsProviderInterface;
use Psr\Container\ContainerInterface;

/**
 * @package Limoncello\Flute
 */
class FormValidatorFactory implements FormValidatorFactoryInterface
{
    use HasContainerTrait;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * @inheritdoc
     */
    public function createValidator(string $class): FormValidatorInterface
    {
        /** @var SettingsProviderInterface $settingsProvider */
        $settingsProvider = $this->getContainer()->get(SettingsProviderInterface::class);
        $settings         = $settingsProvider->get(S::class);
        $ruleSetsData     = $settings[S::KEY_VALIDATION_RULE_SETS_DATA];

        $validator = new Validator($class, $ruleSetsData, $this->getContainer());

        return $validator;
    }
}
