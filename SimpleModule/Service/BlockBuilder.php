<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Service;

use DevVsAdmin\SimpleModule\Api\BuilderInterface;
use DevVsAdmin\SimpleModule\Api\HomeStrategyInterface;
use DevVsAdmin\SimpleModule\Api\HomeStrategyInterfaceFactory;

/**
 * Class BlockBuilder
 */
class BlockBuilder implements BuilderInterface
{
    /**
     * @param HomeStrategyInterface $classFactory
     * @return bool
     */
   public function build($classFactory): HomeStrategyInterface
   {
       return $classFactory->create();
   }
}

