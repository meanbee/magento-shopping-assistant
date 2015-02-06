<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$main_table = $installer->getTable("meanbee_shoppingassistant/request");

$installer->getConnection()->addColumn(
    $main_table,
    "name",
    array(
        "type"     => Varien_Db_Ddl_Table::TYPE_TEXT,
        "length"   => 255,
        "nullable" => false,
        "default"  => "",
        "after"    => "entity_id",
        "comment"  => "Customer Name"
    )
);

$installer->getConnection()->addColumn(
    $main_table,
    "customer_id",
    array(
        "type"     => Varien_Db_Ddl_Table::TYPE_INTEGER,
        "nullable" => true,
        "after"    => "name",
        "comment"  => "Magento Customer ID"
    )
);

$installer->endSetup();
