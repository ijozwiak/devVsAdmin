<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\plugin;

use DevVsAdmin\SimpleModule\Api\SimpleApiInterface;
use Magento\Framework\App\RequestInterface;

/**
 * Class ApiPlugin
 */
class ApiPlugin
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * ApiPlugin constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @param SimpleApiInterface $subject
     * @param string $param
     * @return string[]
     */
    public function beforePluginBefore(SimpleApiInterface $subject, string $param)
    {
        return ['(' . $param . ')'];
    }

    /**
     * @param SimpleApiInterface $subject
     * @param callable $proceed
     * @param string $param
     * @return string
     */
    public function aroundPluginAround(SimpleApiInterface $subject, callable $proceed, string $param)
    {
        if ($param == 'around') {
            return '(' . $proceed($param) . ')';
        } else {
            return $proceed($param);
        }
    }

    /**
     * @param SimpleApiInterface $subject
     * @param string $result
     * @param string $param
     * @return string
     */
    public function afterPluginAfter(SimpleApiInterface $subject, string $result, string $param)
    {
        if ($result == 'after') {
            return '(--' . $result . '--)';
        } elseif ($this->request->getParam('method') == 'test') {
            return '(testowy)';
        }  elseif ($param == 'param') {
            return '(param)';
        } else {
            return $result;
        }
    }
}