<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Controller\Simple;

use DevVsAdmin\SimpleModule\Api\Data\SimpleDataInterface;
use DevVsAdmin\SimpleModule\Model\Simple;
use DevVsAdmin\SimpleModule\Model\SimpleRepository;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * Class Index
 */
class Index extends Action
{
    /**
     * @var SimpleRepository
     */
    private $repository;

    /**
     * Index constructor.
     * @param Context $context
     * @param SimpleDataInterface $simpleData
     */
    public function __construct(Context $context, SimpleRepository $repository)
    {
        parent::__construct($context);

        $this->repository = $repository;
    }

    /**
     * @return void
     */
    public function execute()
    {
        /** @var Simple $simpleModel */
        $simpleModel = $this->repository->getById(1);

        var_dump($simpleModel->getData());
        exit;
    }
}

