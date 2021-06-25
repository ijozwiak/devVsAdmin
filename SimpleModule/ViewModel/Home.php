<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\UIComponent
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\ViewModel;

use DevVsAdmin\SimpleModule\Api\BuilderInterface;
use DevVsAdmin\SimpleModule\Api\HomeStrategyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\Serialize\Serializer\Json;

/**
 * Class Home
 */
class Home implements ArgumentInterface
{
    /**
     * @var
     */
    private $builder;

    /**
     * @var array
     */
    private $blocks;

    /**
     * BlockStrategy constructor.
     * @param BuilderInterface $builder
     */
    public function __construct(BuilderInterface $builder, $blocks = [])
    {
        $this->builder = $builder;
        $this->blocks = $blocks;
    }

    /**
     * @param HomeStrategyInterface $classFactory
     * @return HomeStrategyInterface
     */
    public function getStrategyBlock(string $blockName): ?HomeStrategyInterface
    {
        return isset($this->blocks[$blockName]) ? $this->builder->build($this->blocks[$blockName]) :  null;
    }
}