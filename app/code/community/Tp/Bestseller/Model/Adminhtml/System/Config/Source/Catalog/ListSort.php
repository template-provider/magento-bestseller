<?php

class Tp_Bestseller_Model_Adminhtml_System_Config_Source_Catalog_ListSort extends Mage_Adminhtml_Model_System_Config_Source_Catalog_ListSort
{
    /**
     * Retrieve option values array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = parent::toOptionArray();
        $options[] = array(
            'label' => Mage::helper('catalog')->__('Bestseller'),
            'value' => 'qty_ordered'
        );
        return $options;
    }
}
