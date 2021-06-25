<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Model;

use DevVsAdmin\SimpleModule\Api\Data\SimpleDataInterface;
use DevVsAdmin\SimpleModule\Api\Data\SimpleDataResultInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Class SimpleDataResult
 * @api
 */
class SimpleDataResult extends SearchResults implements SimpleDataResultInterface
{
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * {@inheritdoc}
     */
    public function setItems(array $items = null)
    {
        return $this->setData(self::ITEMS, $items);
    }

    /**
     * {@inheritdoc}
     */
    public function setAggregations($aggregations)
    {
        return $this->setData(self::AGGREGATIONS, $aggregations);
    }

    /**
     * {@inheritdoc}
     */
    public function getAggregations()
    {
        return $this->_get(self::AGGREGATIONS);
    }
}