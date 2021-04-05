<?php
/**

 */
namespace DphInteg\DPHShipping\Model\Data;

use Magento\Framework\Option\ArrayInterface;

class PickupSchedule implements ArrayInterface
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
            'Complete within' => 'Complete within',
            'Complete today before' => 'Complete today before',
            'Complete today anytime' => 'Complete today anytime',
            'Complete tomorrow before' => 'Complete tomorrow before',
            'Complete tomorrow anytime' => 'Complete tomorrow anytime',
            'Complete within the next' => 'Complete within the next'

        ];
        return $choose;
    }
}
