<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleRoute
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleRoute\Controller\Adminhtml\Simple;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Class Example
 */
class Example extends Action implements HttpGetActionInterface
{
    public function execute()
    {
        die('I am here');
    }
}
