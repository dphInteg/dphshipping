<?php
/**
 */
namespace DphInteg\DPHShipping\Model\Data;

use Magento\Framework\Option\ArrayInterface;
use DphInteg\Webhook\Helper\Data;

class OnDemandPartnerType implements ArrayInterface
{
     /**
     * @var Data
     */
    protected $helper;
    
    /**
     * Webhook constructor.
     * @param Data $webHookData
     */
    /*public function __construct(
        Data $webHookData
    ) {
        $this->helper = $webHookData;
    }*/
    
     /*
     * Option getter
     * @return array
     */
    public function toOptionArray()
    {
        //$arr = $this->helper->getPartnersList();
        $arr = $this->toArray();
        $ret = [];
        
        foreach ($arr as $key => $value) {

                $ret[] = [
                 'value' => $key,
                 'label' => $value
            ];
   
        }
        return $ret;
    }
    
    /*
     * Get options in "key-value" format
     * @return array
     */
    public function toArray()
    {
        $choose = [
            'Sandbox_DEMO' => 'Sandbox_DEMO'

        ];
        return $choose;
    }
}