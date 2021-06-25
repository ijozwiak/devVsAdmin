<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Block;

use Magento\Framework\View\Element\Template as BaseTemplate;

use DevVsAdmin\SimpleModule\Api\HomeStrategyInterface;

/**
 * Class FirstBlock
 */
class FirstBlock extends BaseTemplate implements HomeStrategyInterface
{
    protected $_template = 'DevVsAdmin_SimpleModule::first.phtml';
}