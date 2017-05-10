<?php

class Exam_Domain_Block_Adminhtml_Domain_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('domain_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('exam_domain')->__('Domain Information'));
    }
}