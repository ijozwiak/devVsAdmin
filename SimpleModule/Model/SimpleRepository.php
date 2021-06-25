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
use DevVsAdmin\SimpleModule\Api\Data\SimpleDataResultInterfaceFactory as SearchResultInterfaceFactory;
use DevVsAdmin\SimpleModule\Model\ResourceModel\Simple as SimpleResourceModel;
use DevVsAdmin\SimpleModule\Model\SimpleFactory;
use DevVsAdmin\SimpleModule\Model\ResourceModel\Simple\CollectionFactory;
use Exception;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;

/**
 * Class SimpleRepository
 */
class SimpleRepository
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var CollectionProcessor
     */
    private $collectionProcessor;

    /**
     * @var SearchResultInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var SimpleFactory
     */
    private $simpleFactory;

    /**
     * @var SimpleResourceModel
     */
    private $resource;

    /**
     * SimpleRepository constructor.
     * @param CollectionFactory $collectionFactory
     * @param CollectionProcessor $collectionProcessor
     * @param SearchResultInterfaceFactory $searchResultInterfaceFactory
     * @param SimpleFactory $simpleFactory
     * @param SimpleResourceModel $resource
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        CollectionProcessor $collectionProcessor,
        SearchResultInterfaceFactory $searchResultFactory,
        SimpleFactory $simpleFactory,
        SimpleResourceModel $resource
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->resource = $resource;
        $this->searchResultsFactory = $searchResultFactory;
        $this->simpleFactory = $simpleFactory;
    }

    /**
     * @param int $id
     * @return SimpleDataInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): SimpleDataInterface
    {
        $simple = $this->simpleFactory->create();
        $this->resource->load($simple, $id);

        if (!$simple->getId()) {
            throw new NoSuchEntityException(__('Item with id %1 does not exist.', $id));
        }

        return $simple;
    }

    /**
     * @param SimpleDataInterface $simple
     * @throws AlreadyExistsException
     */
    public function save(SimpleDataInterface $simple)
    {
        $this->resource->save($simple);
    }

    /**
     * @param SimpleDataInterface $simple
     * @throws Exception
     */
    public function delete(SimpleDataInterface $simple)
    {
        $this->resource->delete($simple);
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $searchResult = $this->searchResultsFactory->create();
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }
}
