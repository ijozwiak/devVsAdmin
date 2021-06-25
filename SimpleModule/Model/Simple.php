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
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use DevVsAdmin\SimpleModule\Model\ResourceModel\Simple as SimpleResourceModel;

/**
 * Class Simple
 */
class Simple extends AbstractModel implements IdentityInterface, SimpleDataInterface
{
    /**
     * @const string
     */
    const CACHE_TAG = 'devvsadmin_simple';

    /**
     * @var string
     */
    protected $_cacheTag = 'devvsadmin_simple';

    /**
     * @var string
     */
    protected $_eventPrefix = 'devvsadmin_simple';

    /**
     * ResourceModel object initialization
     */
    protected function _construct()
    {
        $this->_init(SimpleResourceModel::class);
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(SimpleDataInterface::NAME);
    }
}

