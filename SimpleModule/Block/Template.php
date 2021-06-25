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
class Template extends BaseTemplate
{
    protected $_template = 'DevVsAdmin_SimpleModule::home.phtml';

    /**
     * @return string
     */
    public function getTemplateValue()
    {
        return $this->_template;
    }
}