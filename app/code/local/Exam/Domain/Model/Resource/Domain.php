<?php

class Exam_Domain_Model_Resource_Domain extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Magento class constructor
     */
    protected function _construct()
    {
        $this->_init('exam_domain/domain', 'entity_id');
    }

}