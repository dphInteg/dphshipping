<?php
/**

 */
namespace DphInteg\DPHShipping\Model\Data;

use Magento\Framework\Option\ArrayInterface;

class OnDemandPickupSchedule implements ArrayInterface
{
        /*
     * Option getter
     * @return array
     */
    public function toOptionArray()
    {
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
            'Within 30 minutes' => 'Within 30 minutes'

        ];
        return $choose;
    }
}
