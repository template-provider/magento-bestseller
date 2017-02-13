<?php

class Tp_Bestseller_Block_Product_List_Toolbar extends
    Mage_Catalog_Block_Product_List_Toolbar
{

    public function setCollection($collection)
    {
        parent::setCollection($collection);

        if ($this->getCurrentOrder()) {
            if ($this->getCurrentOrder() == 'qty_ordered') {
                $this->getCollection()->getSelect()
                    ->order('qty_ordered ' . $this->getCurrentDirection());
            } else {
                $this->getCollection()
                    ->setOrder($this->getCurrentOrder(), $this->getCurrentDirection())->getSelect();
            }
        }

        return $this;
    }


    /**
     * Retrieve current direction
     *
     * @return string
     */
    public function getCurrentDirection()
    {
        $dir = $this->_getData('_current_grid_direction');
        if ($dir) {
            return $dir;
        }

        $directions = array('asc', 'desc');
        $dir = strtolower($this->getRequest()->getParam($this->getDirectionVarName()));
        if ($dir && in_array($dir, $directions)) {
            if ($dir == $this->_direction) {
                Mage::getSingleton('catalog/session')->unsSortDirection();
            } else {
                $this->_memorizeParam('sort_direction', $dir);
            }
        } else {
            $dir = Mage::getSingleton('catalog/session')->getSortDirection();
        }
        // validate direction
        if (!$dir || !in_array($dir, $directions)) {
            if ($this->getCurrentOrder() == 'qty_ordered') {
                $dir = 'desc';
            } else {
                $dir = $this->_direction;
            }
        }
        $this->setData('_current_grid_direction', $dir);
        return $dir;
    }
}