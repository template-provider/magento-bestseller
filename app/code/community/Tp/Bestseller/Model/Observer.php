<?php

class Tp_Bestseller_Model_Observer extends Mage_Core_Model_Abstract
{
    public function updateBestseller()
    {
        $resource = Mage::getSingleton('core/resource');
        $writeConnection = $resource->getConnection('core_write');
        $salesOrderItemTable = $resource->getTableName('sales/order_item');
        $productTable = $resource->getTableName('catalog/product');
        $query = "Update {$productTable} as C 
inner join (select count(*) as qty_ordered, product_id 
from {$salesOrderItemTable} 
group by product_id order by 1 desc) as A on C.entity_id = A.product_id 
set C.qty_ordered = A.qty_ordered";
        Mage::log($query);

        $writeConnection->query($query);
    }
}