<?php
/**
 */
namespace DphInteg\DPHShipping\Model\Data;

use Magento\Framework\Option\ArrayInterface;
use DphInteg\Webhook\Helper\Data;

class PartnerType implements ArrayInterface
{
     /**
     * @var Data
     */
    protected $helper;
    
    /**
     * Webhook constructor.
     * @param Data $webHookData
     */
    public function __construct(
        Data $webHookData
    ) {
        $this->helper = $webHookData;
    }
    
     /*
     * Option getter
     * @return array
     */
    public function toOptionArray()
    {
        $arr = $this->helper->getPartnersList();
        $ret = [];
        
        foreach ($arr as $key => $value) {
            
            //if($value['serviceType']==='scheduled'){
                $ret[] = [
                'value' => $value['id'],
                'label' => $value['name']
            ];
            //}
            
        }
        return $ret;
    }

}