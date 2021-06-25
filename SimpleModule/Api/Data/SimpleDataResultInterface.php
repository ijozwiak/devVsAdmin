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

use Magento\Framework\Api\Search\SearchResultInterface;
use DevVsAdmin\SimpleModule\Api\Data\SimpleDataInterface;

/**
 * Interface SimpleDataInterface
 * @api
 */
interface SimpleDataResultInterface extends SearchResultInterface
{
    /**
     * @return \DevVsAdmin\SimpleModule\Api\Data\SimpleDataInterface[]
     */
    public function getItems();
}

