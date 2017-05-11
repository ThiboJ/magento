<?php

class Exam_Domain_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function viewAction()
    {
        $domain = Mage::getModel('exam_domain/domain');

        $urlKey = $this->getRequest()->getParam('url', '');
        if (strlen($urlKey) > 0) {
            $domain->load($urlKey, 'url_key');
        } else {
            $id = (int)$this->getRequest()->getParam('id', 0);
            $domain->load($id);
        }

        if ($domain->getId() < 1) {
            $this->_redirect('*/*/index');
        }

        Mage::register('domain_data', $domain);

        $this->loadLayout();
        $this->renderLayout();
    }

}