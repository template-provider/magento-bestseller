<?php

class Tp_Bestseller_Model_Config extends Mage_Catalog_Model_Config
{
    /**
     * @return array
     */
    public function getAttributeUsedForSortByArray()
    {
        return array_merge(
            parent::getAttributeUsedForSortByArray(),
            array('qty_ordered' => Mage::helper('catalog')->__('Bestseller'))
        );
    }
}