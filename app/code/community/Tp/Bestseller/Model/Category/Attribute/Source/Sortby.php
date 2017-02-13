<?php

class Tp_Bestseller_Model_Category_Attribute_Source_Sortby
    extends Mage_Catalog_Model_Category_Attribute_Source_Sortby
{
    /**
     * @return array
     */
    public function getAllOptions()
    {
        if (is_null($this->_options)) {
            $this->_options = array(
                array(
                    'label' => Mage::helper('catalog')->__('Best Value'),
                    'value' => 'position'
                ),
                array(
                    'label' => Mage::helper('catalog')->__('Bestseller'),
                    'value' => 'qty_ordered'
                )
            );
            foreach ($this->_getCatalogConfig()->getAttributesUsedForSortBy() as $attribute) {
                $this->_options[] = array(
                    'label' => Mage::helper('catalog')->__($attribute['frontend_label']),
                    'value' => $attribute['attribute_code']
                );
            }
        }
        return $this->_options;
    }
}
