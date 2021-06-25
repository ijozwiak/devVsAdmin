<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\CustomWidget
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\CustomWidget\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class MyWidget
 */
class MyWidget extends Template implements BlockInterface
{
    /**
     * @const string
     */
    private const BLANK = 'n/a';

    /**
     * @return string
     */
    public function getSomeText(): string
    {
        return trim($this->getData('some_text')) ?: self::BLANK;
    }

}
