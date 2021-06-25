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

use Magento\Catalog\Api\Data\CategoryLinkInterfaceFactory;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * Class Ext
 */
class Ext2 extends Action
{
    /**
     * @var ProductInterface
     */
    private $modelData;

    /**
     * Ext constructor.
     * @param Context $context
     * @param ProductInterface $extModel
     */
    public function __construct(Context $context, ProductInterface $modelData, CategoryLinkInterfaceFactory $categoryLinkDataFactory)
    {
        parent::__construct($context);

        $this->modelData = $modelData;
        $this->categoryLinkDataFactory = $categoryLinkDataFactory;
    }

    /**
     * @return void
     */
    public function execute()
    {
//        $product = $this->modelData->load(42);
//
//        $extensionAttributes = $product->getExtensionAttributes();
//        var_dump($extensionAttributes->getOurCustomData());

        $categoryLink = $this->categoryLinkDataFactory->create();
        $categoryLink->setCategoryId(1);
        $extensionAttributes = $categoryLink->getExtensionAttributes();
        var_dump($extensionAttributes->getOurCustomData());
    }
}

