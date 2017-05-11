<?php

class Exam_Domain_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getNbProductByDomain( $idDomain ){
        $connection = Mage::getSingleton('core/resource')->getConnection('core_read');
        $query      = "Select * from exam_domain_product where domain_id = ".$idDomain.";";
        $rows       = $connection->fetchAll($query);

        return count($rows);
    }
}