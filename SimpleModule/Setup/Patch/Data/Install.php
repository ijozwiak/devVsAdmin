<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use DevVsAdmin\SimpleModule\Model\ResourceModel\Simple as SimpleResourceModel;

/**
 * Class Install
 * @package DevVsAdmin\SimpleModule\Setup\Patch\Data
 */
class Install implements DataPatchInterface
{
    /**
     * @var array
     */
    private $data = [
        [
            'name' => 'Simple 1',
            'value' => 'Value 1'
        ],
        [
            'name' => 'Simple 2',
            'value' => 'Value 2'
        ]
    ];

    /**
     * @var SimpleResourceModel
     */
    private $resource;

    /**
     * Install constructor.
     * @param SimpleResourceModel $resource
     */
    public function __construct(SimpleResourceModel $resource)
    {
        $this->resource = $resource;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $table = $this->resource->getMainTable();
        $this->resource->getConnection()->insertMultiple($table, $this->data);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    public function revert()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}