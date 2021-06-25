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

use DevVsAdmin\SimpleModule\Api\Data\SimpleDataInterface;
use DevVsAdmin\SimpleModule\Api\Data\SimpleDataResultInterface;
use DevVsAdmin\SimpleModule\Api\SimpleApiInterface;
use DevVsAdmin\SimpleModule\Model\SimpleDataResult;
use DevVsAdmin\SimpleModule\Model\SimpleRepository;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResults;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Webapi\Exception;

/**
 * Class SimpleApi
 */
class SimpleApi implements SimpleApiInterface
{
    /**
     * @var SimpleRepository
     */
    private $simpleRepository;

    /**
     * @var string
     */
    private $param = 'around';

    /**
     * @var SimpleApiProxy
     */
    private $proxy;

    /**
     * SimpleApi constructor.
     * @param SimpleRepository $simpleRepository
     */
    public function __construct(SimpleRepository $simpleRepository, SimpleApiProxy $proxy)
    {
        $this->simpleRepository = $simpleRepository;
        $this->proxy = $proxy;
    }

    /**
     * @return SimpleDataInterface
     */
    public function execute(): SimpleDataInterface
    {
        try {
            return $this->proxy->getSimple(3);
        } catch (NoSuchEntityException $e) {
            throw new Exception(__($e->getMessage()));
        }
    }

    /**
     * @param int $id
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getSimple(int $id)
    {
        $this->simpleRepository->getById($id);
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface
     * @return \DevVsAdmin\SimpleModule\Model\SimpleDataResult
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SimpleDataResult
    {
        return $this->simpleRepository->getList($searchCriteria);
    }

    /**
     * @param string
     * @return string
     */
    public function plugin(string $param): string {
        return $param;
    }

    /**
     * @param string
     * @return string
     */
    public function pluginBefore(string $param): string {
        return $this->plugin($param);
    }

    /**
     * @param string
     * @return string
     */
    public function pluginAround(string $param): string {
        return $this->plugin($param);
    }

    /**
     * @param string
     * @return string
     */
    public function pluginAfter(string $param): string {
        return $this->plugin($param);
    }
}

