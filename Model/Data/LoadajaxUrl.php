<?php
namespace DphInteg\DPHShipping\Model\Data;

use Psr\Log\LoggerInterface;
use Magento\Store\Model\StoreManagerInterface;
use DphInteg\Webhook\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;

class LoadajaxUrl implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var Data
     */
    protected $helper;
    
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
   
    public function __construct(
        Data $webHookData,
        StoreManagerInterface $storeManager,
        LoggerInterface $logger,
        ScopeConfigInterface $scopeConfig
        
    ) {
        $this->helper = $webHookData;
        $this->logger = $logger;
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }
    public function getProductInfoUrl()
    {
        return $this->helper->getProductInfoUrl();
    }
    public function getAuthorizationKey()
    {
        return $this->helper->getAuthorizationKey();
    }    
}