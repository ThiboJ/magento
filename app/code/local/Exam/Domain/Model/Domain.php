<?php

class Exam_Domain_Model_Domain extends Mage_Core_Model_Abstract
{

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';


    protected $_productInstance = null;

    /**
     * Magento class constructor
     */
    protected function _construct()
    {
        $this->_init('exam_domain/domain');
    }

    public function getProductInstance(){
        if (!$this->_productInstance) {
            $this->_productInstance = Mage::getSingleton('exam_domain/domain_product');
        }
        return $this->_productInstance;
    }

    protected function _beforeSave()
    {
        $this->_prepareUrlKey();

        return parent::_beforeSave();
    }

    protected function _afterSave() {
        $this->getProductInstance()->saveDomainRelation($this);
        return parent::_afterSave();
    }

    public function getSelectedProducts(){
        if (!$this->hasSelectedProducts()) {
            $products = array();
            foreach ($this->getSelectedProductsCollection() as $product) {
                $products[] = $product;
            }
            $this->setSelectedProducts($products);
        }
        return $this->getData('selected_products');
    }

    public function getSelectedProductsCollection(){
        $collection = $this->getProductInstance()->getProductCollection($this);
        return $collection;
    }

    protected function _prepareUrlKey()
    {
        $nbRows = $this->countDomain();
        if ($nbRows == 0) {
            $this->setUrlKey(Mage::getModel('catalog/product_url')->formatUrlKey($this->getName()));
        }else{
            $this->setUrlKey(Mage::getModel('catalog/product_url')->formatUrlKey($this->getName().'-'.++$nbRows));
        }
         return $this;
    }

    protected function countDomain()
    {
        $connection = Mage::getSingleton('core/resource')->getConnection('core_read');
        $query = "Select url_key from exam_domain_domain WHERE url_key LIKE '".$this->getName()."%';";
        $rows = $connection->fetchAll($query);

        return count($rows);
    }

}