<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\UIComponent
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\UIComponent\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\Serialize\Serializer\Json;

/**
 * Class Home
 */
class Home implements ArgumentInterface
{
    /**
     * @var Json
     */
    private $jsonHelper;

    /**
     * @var array
     */
    private $data = [
        [
            'sku' => '12345',
            'name' => 'Product 1'
        ],
        [
            'sku' => '6789',
            'name' => 'Product 2'
        ],
    ];

    /**
     * Home constructor.
     * @param Json $jsonHelper
     */
    public function __construct(Json $jsonHelper)
    {
        $this->jsonHelper = $jsonHelper;
    }

    /**
     * @return string
     */
    public function getJsonConfig(): string
    {
        return $this->jsonHelper->serialize($this->data);
    }
}