<?php

class Exam_Domain_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getNbProductByDomain( $idDomain ){
        $connection = Mage::getSingleton('core/resource')->getConnection('core_read');
        $query      = "Select * from exam_domain_product where domain_id = ".$idDomain.";";
        $rows       = $connection->fetchAll($query);

        return count($rows);
    }

    public function getDomainUrl(Exam_Domain_Model_Domain $domain)
    {
        if (!$domain instanceof Exam_Domain_Model_Domain){
            return '#';
        }

        return $this->_getUrl('exam_domain/index/view',['url' => $domain->getUrlKey()]);
    }

    public function getProductsByDomain( $idDomain ){
        $connection = Mage::getSingleton('core/resource')->getConnection('core_read');
        $query      = "Select * from exam_domain_product where domain_id = ".$idDomain.";";
        $rows       = $connection->fetchAll($query);

        return $rows;
    }
}