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

use DevVsAdmin\SimpleModule\Api\Data\SimpleDataInterface;
use DevVsAdmin\SimpleModule\Model\SimpleDataResult;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface SimpleApiInterface
 * @api
 */
interface SimpleApiInterface
{
    /**
     * @return \DevVsAdmin\SimpleModule\Api\Data\SimpleDataInterface
     */
    public function execute(): SimpleDataInterface;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface
     * @return \DevVsAdmin\SimpleModule\Api\Data\SimpleDataResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SimpleDataResult;

    /**
     * @param string
     * @return string
     */
    public function plugin(string $param): string;

    /**
     * @param string
     * @return string
     */
    public function pluginBefore(string $param): string;

    /**
     * @param string
     * @return string
     */
    public function pluginAround(string $param): string;

    /**
     * @param string
     * @return string
     */
    public function pluginAfter(string $param): string;
}

