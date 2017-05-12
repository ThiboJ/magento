<?php

class Exam_Domain_Helper_Data extends Mage_Core_Helper_Abstract
{
    const IMAGE_FOLDER = "domain";
    const IMAGE_PRODUCT_FOLDER = "catalog/product";

    /**
     * Renvoie l'URL de l'image
     * @param $filename
     * @return string
     */
    public function getImageUrl($filename)
    {
        return Mage::getBaseUrl('media') . self::IMAGE_FOLDER . '/' . $filename;
    }

    public function getProductImageUrl($filename)
    {
            return Mage::getBaseUrl('media') . self::IMAGE_PRODUCT_FOLDER . $filename;
    }

    public function getDomainUrl(Exam_Domain_Model_Domain $domain)
    {
        if (!$domain instanceof Exam_Domain_Model_Domain){
            return '#';
        }

        return $this->_getUrl('exam_domain/index/view',['url' => $domain->getUrlKey()]);
    }

    public function getProductsByDomain( $domain , $onlySize = false ){
        if($onlySize){
            $collection = $domain->getSelectedProductsCollection()
                ->addFieldToFilter('visibility', Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH)
                ->addAttributeToFilter('status', array('eq' => 1));
            $count = ( count($collection)==0 ? "0" : count($collection) );
            return $count;
        }
        else{
            return $domain->getSelectedProductsCollection()
                ->addAttributeToSelect(array("price","name","product_url","image"))
                ->addFieldToFilter('visibility', Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH)
                ->addAttributeToFilter('status', array('eq' => 1));
        }
    }
}