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
/**
 * Class Simple
 */
class TemplateExt extends BaseTemplate
{
    private const TEMPLATE = 'DevVsAdmin_SimpleModule::homeext.phtml';
    protected $_template = 'DevVsAdmin_SimpleModule::homeext.phtml';

    /**
     * @return string
     */
    public function getTemplate()
    {
        return self::TEMPLATE;
    }

    /**
     * @return string
     */
    public function getTemplateValue()
    {
        return $this->_template;
    }

    /**
     * @param string $value
     * @return string
     */
    public function getBlockHtml($value) {
        $block = $this->getViewModel()->getStrategyBlock($value);

        if (is_null($block)) {
            return '';
        }

        return $block->toHtml();
    }
}