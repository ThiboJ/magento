<?php

class Exam_Domain_Block_Domain extends Mage_Core_Block_Template
{
    public function getDomains()
    {
        $domains = Mage::getModel('exam_domain/domain')
            ->getCollection()
            ->addIsActiveFilter()
            ->addOrderByPosition();

        return $domains;
    }
}