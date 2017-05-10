<?php

class Exam_Domain_Block_Adminhtml_Domain_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('domain_form', array('legend' => Mage::helper('exam_domain')->__('Domain information')));

        $fieldset->addType('image', 'Exam_Domain_Block_Adminhtml_Form_Renderer_Image');

        $fieldset->addField('name', 'text', array(
            'label'    => Mage::helper('exam_domain')->__('Name'),
            'name'     => 'name',
            'class'    => 'required-entry',
            'required' => true
        ));

        $fieldset->addField('image_url', 'image', array(
            'label'     => Mage::helper('exam_domain')->__('Image'),
            'required'  => false,
            'name'      => 'image_url',
            'directory' => 'domain/'
        ));

        $fieldset->addField('is_active', 'select', array(
            'label'    => Mage::helper('exam_domain')->__('Status'),
            'name'     => 'is_active',
            'class'    => 'required-entry',
            'values'   => Mage::getSingleton('adminhtml/system_config_source_enabledisable')->toOptionArray(),
            'required' => true
        ));

        $fieldset->addField('position', 'text', array(
            'label'    => Mage::helper('exam_domain')->__('Position'),
            'class'    => 'validate-number',
            'name'     => 'position',
            'required' => true,
            'value'    => 0
        ));

        if (Mage::getSingleton('adminhtml/session')->getDomainData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getDomainData());
            Mage::getSingleton('adminhtml/session')->getDomainData(null);
        } elseif (Mage::registry('domain_data')) {
            $form->setValues(Mage::registry('domain_data')->getData());
        }

        return parent::_prepareForm();
    }

    public function getTabLabel()
    {
        return Mage::helper('exam_domain')->__('Domain Information');
    }

    public function getTabTitle()
    {
        return Mage::helper('exam_domain')->__('Domain Information');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}