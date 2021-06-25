<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Model\ResourceModel\Simple;

use DevVsAdmin\SimpleModule\Model\Simple;
use DevVsAdmin\SimpleModule\Model\ResourceModel\Simple as SimpleResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'simple_id';

    /**
     * @var string
     */
    protected $_eventPrefix = 'devvsadmin_simple_collection';

    /**
     * @var string
     */
    protected $_eventObject = 'simple_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Simple::class, SimpleResourceModel::class);
    }
}

