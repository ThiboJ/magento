<?php

$installer = $this;
$installer->startSetup();

$domainTable = $installer->getConnection()
    ->newTable($installer->getTable('exam_domain/domain'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true,
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array())
    ->addColumn('latitude', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array())
    ->addColumn('longitude', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array())
    ->addColumn('image_url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array())
    ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array())
    ->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array());

$installer->getConnection()->createTable($domainTable);

$installer->endSetup();