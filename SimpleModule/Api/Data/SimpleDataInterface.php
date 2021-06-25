<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Api\Data;

/**
 * Interface SimpleDataInterface
 * @api
 */
interface SimpleDataInterface
{
    /**
     * @const string
     */
    public const NAME = 'name';
    /**
     * @return string
     */
    public function getName(): string;
}

