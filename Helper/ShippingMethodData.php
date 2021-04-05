<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DphInteg\DPHShipping\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;


/**
 * Class ShippingMethodData
 * @package DphInteg\DPHShipping\Helper
 */
class ShippingMethodData extends AbstractHelper
{

     /**
     * @var StoreManagerInterface
     */
    private $storeManager;
  
    /**
     * Base path to DPHInteg Shipping configuration values
     */
    
     const XML_PATH_SHIPPING = 'carriers/dphshipping';
     const XML_SHIPPING_CODE = 'dphshipping';
     const XML_SHIPPING_ACTIVE = self::XML_PATH_SHIPPING . '/active';
     const XML_SHIPPING_TITLE = self::XML_PATH_SHIPPING . '/title';
     const XML_SHIPPING_NAME = self::XML_PATH_SHIPPING . '/name';
     const XML_SHIPPING_COST = self::XML_PATH_SHIPPING . '/shipping_cost';
     const XML_SHIPPING_SERVICE_TYPE = self::XML_PATH_SHIPPING . '/service_type';
     
     const XML_SHIPPING_ONDEMAND_PICKUP_SCHED = self::XML_PATH_SHIPPING . '/ondemand_pickup_schedule';
     const XML_SHIPPING_PICKUP_SCHED = self::XML_PATH_SHIPPING . '/pickup_schedule';
     const XML_SHIPPING_PICKUP_MINUTES = self::XML_PATH_SHIPPING . '/pickup_minutes';
     const XML_SHIPPING_PICKUP_DAYS = self::XML_PATH_SHIPPING . '/pickup_days';
     const XML_SHIPPING_PICKUP_TIME = self::XML_PATH_SHIPPING . '/pickup_time';
     
     const XML_SHIPPING_ONDEMAND_DELIVERY_SCHED = self::XML_PATH_SHIPPING . '/ondemand_delivery_schedule';
     const XML_SHIPPING_DELIVERY_SCHED = self::XML_PATH_SHIPPING . '/delivery_schedule';
     const XML_SHIPPING_DELIVERY_MINUTES = self::XML_PATH_SHIPPING . '/delivery_minutes';
     const XML_SHIPPING_DELIVERY_DAYS = self::XML_PATH_SHIPPING . '/delivery_days';
     const XML_SHIPPING_DELIVERY_TIME = self::XML_PATH_SHIPPING . '/delivery_time';
     
     const XML_SHIPPING_ONDEMAND_PARTNER = self::XML_PATH_SHIPPING . '/ondemand_partner';
     const XML_SHIPPING_PARTNER = self::XML_PATH_SHIPPING . '/partner';
     const XML_SHIPPING_PACKAGING_SIZE = self::XML_PATH_SHIPPING . '/packaging_size';
    
    
    /**
     * Data constructor.
     *
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

     /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_SHIPPING_ACTIVE);
    }

    /**
     * @return mixed
     */
    public function getShippingTitle()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_TITLE);
    }
 
    /**
     * @return mixed
     */
    public function getShippingName()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_NAME);
    }
 
    /**
     * @return mixed
     */
    public function getShippingCost()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_COST);
    }
 
     /**
     * @return mixed
     */
    public function getServiceType()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_SERVICE_TYPE);
    }
 
    /**
     * @return mixed
     */
    public function getOnDemandPickupSchedule()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_ONDEMAND_PICKUP_SCHED);
    }
 
    /**
     * @return mixed
     */
    public function getPickupSchedule()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_PICKUP_SCHED);
    }
    
    public function getPickupMinutes()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_PICKUP_MINUTES);
    }
 
    /**
     * @return mixed
     */
    public function getPickupDays()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_PICKUP_DAYS);
    }
 
    /**
     * @return mixed
     */
    public function getPickupTime()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_PICKUP_TIME);
    }
    
    /**
     * @return mixed
     */
    public function getOnDemandDeliverySchedule()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_ONDEMAND_DELIVERY_SCHED);
    }
 
    /**
     * @return mixed
     */
    public function getDeliverySchedule()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_DELIVERY_SCHED);
    }
    
    public function getDeliveryMinutes()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_DELIVERY_MINUTES);
    }
 
    /**
     * @return mixed
     */
    public function getDeliveryDays()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_DELIVERY_DAYS);
    }
 
    /**
     * @return mixed
     */
    public function getDeliveryTime()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_DELIVERY_TIME);
    }
    
    /**
     * @return mixed
     */
    public function getOnDemandPartner()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_ONDEMAND_PARTNER);
    }
 
    /**
     * @return mixed
     */
    public function getPartner()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_PARTNER);
    }
    
    /**
     * @return mixed
     */
    public function getShippingCode()
    {
        return self::XML_SHIPPING_CODE;
    }
    
     /**
     * @return mixed
     */
    public function getPackagingSize()
    {
        return $this->scopeConfig->getValue(self::XML_SHIPPING_PACKAGING_SIZE);
    }


    /**
     * @param $item
     *
     * @return int
     * @throws NoSuchEntityException
     */
    public function getItemStore($item)
    {
        return $item->getData('store_id') ?: $this->storeManager->getStore()->getId();
    }
}