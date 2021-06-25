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

use DevVsAdmin\SimpleModule\Model\SimpleRepository;
use Magento\Framework\Session\SessionManager;

/**
 * Class SimpleApiProxy
 */
class SimpleApiProxy
{
    /**
     * @const int
     */
    private const LIFE_TIME = 3600;

    /**
     * @var array
     */
    private $registry;

    /**
     * @var SessionManager
     */
    private $session;

    /**
     * @var SimpleRepository
     */
    private $repository;

    /**
     * SimpleApiProxy constructor.
     * @param SimpleRepository $simpleRepository
     * @param SessionManager $session
     */
    public function __construct(SimpleRepository $simpleRepository,SessionManager $session)
    {
        $this->registry = $session->getSimpleApiRegistry() ?: [];
        $this->session = $session;
        $this->repository = $simpleRepository;
    }

    public function getSimple(int $id)
    {
        $simple = $this->registry['simple/' . $id] ?? null;

        if (is_null($simple)) {
            $simple = $this->repository->getById($id);
            $this->registry['simple/' . $id] = $simple;
            $this->session->setSimpleApiRegistry($this->registry);
        }

        return $simple;
    }
}

