<?php

class Exam_Domain_Block_View extends Mage_Core_Block_Template
{
    public function getCurrentDomain()
    {
        return Mage::registry('domain_data');
    }

}
