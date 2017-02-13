<?php
$installer = $this;

$installer->startSetup();

$productEntityTable = $installer->getTable('catalog/product');

$installer->run("ALTER TABLE `{$productEntityTable}` ADD `qty_ordered` INT NULL");
$installer->endSetup();
