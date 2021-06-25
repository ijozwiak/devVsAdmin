<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Model\Resolver;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\DataObjectFactory;

/**
 * Class Simplename
 */
class Simplename implements ResolverInterface
{
    /**
     * @var ValueFactory
     */
    private $valueFactory;

    /**
     * @var DataObjectFactory
     */
    private $dataObjectFactory;

    /**
     * Simple constructor.
     * @param ValueFactory $valueFactory
     * @param DataObjectFactory $dataObjectFactory
     */
    public function __construct(ValueFactory $valueFactory, DataObjectFactory $dataObjectFactory)
    {
        $this->valueFactory = $valueFactory;
        $this->dataObjectFactory = $dataObjectFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)  {

        if (!isset($args['firstname']) || !isset($args['lastname'])) {
            throw new GraphQlAuthorizationException(
                __('Firstname or lastname has been not provided. Please provide both of them')
            );
        }
        try {
            $data = [
                'firstname' => $args['firstname'],
                'lastname' => $args['lastname'],
            ];
            $dataObj = $this->dataObjectFactory->create(['data' => $data]);
            $result = function () use ($dataObj) {
                return $dataObj ?: [];
            };
            return $this->valueFactory->create($result);
        } catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        } catch (LocalizedException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        }
    }
}