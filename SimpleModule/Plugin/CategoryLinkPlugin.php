<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Plugin;

use Magento\Catalog\Api\Data\CategoryLinkInterface;

/**
 * Class ProductPlugin
 */
class CategoryLinkPlugin
{
    /**
     * @param CategoryLinkInterface $subject
     * @param CategoryLinkInterface $result
     */
    public function afterSetCategoryId(CategoryLinkInterface $subject, CategoryLinkInterface $result): CategoryLinkInterface
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $extensionAttributes->setOurCustomData('some new value');
        $result->setExtensionAttributes($extensionAttributes);

        return $result;
    }
}