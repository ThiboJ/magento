<?php

class Exam_Domain_Block_Adminhtml_Domain extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_controller     = 'adminhtml_domain';
        $this->_blockGroup     = 'exam_domain';
        $this->_headerText     = Mage::helper('exam_domain')->__('Manage Domains');
        $this->_addButtonLabel = Mage::helper('exam_domain')->__('Add Domain');
        parent::__construct();
    }
}