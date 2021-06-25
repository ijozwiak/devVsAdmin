<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Api;

/**
 * Interface SimpleValueApiInterface
 * @api
 */
interface SimpleValueApiInterface
{
    /**
     * @param string $param
     * @return bool
     */
    public function setValue(string $param, string $value): bool;

    /**
     * @param string $param
     * @return string
     */
    public function getValue(string $param): string;

    /**
     * @param string $param
     * @return bool
     */
    public function unsValue(string $param): bool;
}

