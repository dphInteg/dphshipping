<?php
/**

 */
namespace DphInteg\DPHShipping\Model\Data;

use Magento\Framework\Option\ArrayInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use DphInteg\Webhook\Helper\Data;

class PackagingSizeType implements ArrayInterface
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var Data
     */
    protected $helper;

    public function __construct( ScopeConfigInterface $scopeConfig, Data $webHookData ) {
        $this->helper = $webHookData;
        $this->scopeConfig = $scopeConfig;
    }    
    /*
     * Option getter
     * @return array
     */
    public function toOptionArray()
    {
        $ret = [];
        $size_code = "";
        foreach ($this->getPackageSizeListByPartner() as $key => $value) {
            switch($value->size){
                case 'small':
                $size_code = "S";
                break;
                case 'medium':
                $size_code = "M";
                break;
                case 'large':
                $size_code = "L";
                break;
                case 'extra_large':
                $size_code = "XL";
                break;
            }
            $ret[] = [
                'value' => $size_code,
                'label' => $size_code
            ];
        }
        return $ret;
    }
    /**
     * get selected partner
     */
    public function selectedPartner() {
        if($this->scopeConfig->getValue('carriers/dphshipping/partner', \Magento\Store\Model\ScopeInterface::SCOPE_STORE)) {
            return $this->scopeConfig->getValue('carriers/dphshipping/partner', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        } else {
            return $this->helper->getPartnersList()[0]['id']; //assuming value id key is 'id'; gets first array entry
        }
    }
    /**
     * gets package list by partners
     */
    public function getPackageSizeListByPartner() {
        $productInfoList = $this->helper->getProductInfoList($this->selectedPartner());
        $response = json_decode($productInfoList['response'])->result;
        return $response;
    }
}
