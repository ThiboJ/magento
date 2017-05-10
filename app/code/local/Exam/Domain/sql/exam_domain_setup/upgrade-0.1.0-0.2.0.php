<?php


$table = $this->getConnection()
    ->newTable($this->getTable('exam_domain/domain_product'))
    ->addColumn('rel_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Relation ID')
    ->addColumn('domain_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => '0',
    ), 'Domain ID')
    ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => '0',
    ), 'Product ID')
    ->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        'default'   => '0',
    ), 'Position')
    ->addIndex($this->getIdxName('exam_domain/domain_product', array('product_id')), array('product_id'))
    ->addForeignKey($this->getFkName('exam_domain/domain_product', 'domain_id', 'exam_domain/domain', 'entity_id'), 'domain_id', $this->getTable('exam_domain/domain'), 'entity_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->addForeignKey($this->getFkName('exam_domain/domain_product', 'product_id', 'catalog/product', 'entity_id'),    'product_id', $this->getTable('catalog/product'), 'entity_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Domain to Product Linkage Table');
$this->getConnection()->createTable($table);