<?php
/**
 * Used in creating options config value selection
 *
 */
class Dreamsites_Performancestats_Model_System_Config_Source_Hours
{
 
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 0,  'label'=>Mage::helper('performancestats')->__('00:00')),
            array('value' => 1,  'label'=>Mage::helper('performancestats')->__('01:00')),
            array('value' => 2,  'label'=>Mage::helper('performancestats')->__('02:00')),
            array('value' => 3,  'label'=>Mage::helper('performancestats')->__('03:00')),
            array('value' => 4,  'label'=>Mage::helper('performancestats')->__('04:00')),
            array('value' => 5,  'label'=>Mage::helper('performancestats')->__('05:00')),
            array('value' => 6,  'label'=>Mage::helper('performancestats')->__('06:00')),
            array('value' => 7,  'label'=>Mage::helper('performancestats')->__('07:00')),
            array('value' => 8,  'label'=>Mage::helper('performancestats')->__('08:00')),
            array('value' => 9,  'label'=>Mage::helper('performancestats')->__('09:00')),
            array('value' => 10,  'label'=>Mage::helper('performancestats')->__('10:00')),
            array('value' => 11,  'label'=>Mage::helper('performancestats')->__('11:00')),
            array('value' => 12,  'label'=>Mage::helper('performancestats')->__('12:00')),
            array('value' => 13,  'label'=>Mage::helper('performancestats')->__('13:00')),
            array('value' => 14,  'label'=>Mage::helper('performancestats')->__('14:00')),
            array('value' => 15,  'label'=>Mage::helper('performancestats')->__('15:00')),
            array('value' => 16,  'label'=>Mage::helper('performancestats')->__('16:00')),
            array('value' => 17,  'label'=>Mage::helper('performancestats')->__('17:00')),
            array('value' => 18,  'label'=>Mage::helper('performancestats')->__('18:00')),
            array('value' => 19,  'label'=>Mage::helper('performancestats')->__('19:00')),
            array('value' => 20,  'label'=>Mage::helper('performancestats')->__('20:00')),
            array('value' => 21,  'label'=>Mage::helper('performancestats')->__('21:00')),
            array('value' => 22,  'label'=>Mage::helper('performancestats')->__('22:00')),
            array('value' => 23,  'label'=>Mage::helper('performancestats')->__('23:00')),
        );
    }
 
}