<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Service;

use Magento\Framework\Registry;
use DevVsAdmin\SimpleModule\Api\SimpleValueApiInterface;
use Magento\Framework\Session\SessionManager;

/**
 * Class SimpleApi
 */
class SetValue implements SimpleValueApiInterface
{
    /**
     * @const string
     */
    private const NONE = 'N/A';

    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var SessionManager
     */
    private $session;

    /**
     * SetValue constructor.
     * @param Registry $registry
     * @param SessionManager $session
     */
    public function __construct(Registry $registry, SessionManager $session)
    {
        $this->registry = $session->getSimpleModuleRegistry() ?? $registry;
        $this->session = $session;

        $this->objectManager->create(SimpleModuleDataProvider::class);
    }

    /**
     * @param string $param
     * @return bool
     */
    public function setValue(string $param, string $value): bool
    {
        try {
            $this->registry->register($param, $value);
            $this->session->setSimpleModuleRegistry($this->registry);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param string $param
     * @return bool
     */
    public function unsValue(string $param): bool
    {
        try {
            $this->registry->unregister($param);
            $this->session->setSimpleModuleRegistry($this->registry);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param string $param
     * @return string
     */
    public function getValue(string $param): string
    {
        try {
            $value = $this->registry->registry($param);
            return $value ?: self::NONE;
        } catch (\Exception $e) {
            return self::NONE;
        }
    }
}