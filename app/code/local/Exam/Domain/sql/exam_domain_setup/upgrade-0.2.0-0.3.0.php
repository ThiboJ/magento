<?php
$installer = $this;
$installer->startSetup();
$installer->getConnection()->addColumn(
    $this->getTable('exam_domain/domain'),
    'url_key',
    'varchar(255) NOT NULL'
);

$installer->endSetup();