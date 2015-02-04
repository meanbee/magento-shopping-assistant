<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$main_table = $installer->getTable("meanbee_shoppingassistant/request");

if ($installer->tableExists($main_table)) {
    $installer->getConnection()->dropTable($main_table);
}

$table = $installer->getConnection()
    ->newTable($main_table)
    ->addColumn("entity_id", Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        "identity" => true,
        "unsigned" => true,
        "nullable" => false,
        "primary"  => true,
    ), "Entity ID")
    ->addColumn("url", Varien_Db_Ddl_Table::TYPE_TEXT, 2048, array(
        "nullable" => false,
    ), "Request URL")
    ->addColumn("created_at", Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), "Creation Time")
    ->setComment("Shopping Assistant Request Table");
$installer->getConnection()->createTable($table);

$installer->endSetup();
