<?php

class Exam_Domain_Block_Adminhtml_Domain_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('entity_id');
        $this->setId('exam_domain_domain_grid');
        $this->setDefaultDir('asc');
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('exam_domain/domain')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {

        $this->addColumn('entity_id', array(
            'header' => $this->__('ID'),
            'align'  => 'right',
            'width'  => '50px',
            'index'  => 'entity_id'
        ));

        $this->addColumn('name', array(
            'header' => $this->__('Name'),
            'align'  => 'right',
            'width'  => '100px',
            'index'  => 'name'
        ));

        $this->addColumn('latitude', array(
            'header' => $this->__('Latitude'),
            'align'  => 'right',
            'width'  => '100px',
            'index'  => 'latitude'
        ));

        $this->addColumn('longitude', array(
            'header' => $this->__('Longitude'),
            'align'  => 'right',
            'width'  => '100px',
            'index'  => 'longitude'
        ));

        $this->addColumn('is_active', array(
            'header'  => $this->__('Status'),
            'index'   => 'is_active',
            'type'    => 'options',
            'options' => Mage::getSingleton('adminhtml/system_config_source_yesno')->toArray(),
            'align'   => 'left',
            'width'   => '100px'
        ));


        $this->addColumn('image_url', array(
                'header' => $this->__('Image URL'),
                'align'  => 'right',
                'width'  => '100px',
                'index'  => 'image_url'
            ));

        $this->addColumn('position', array(
            'header' => $this->__('Position'),
            'align'  => 'right',
            'width'  => '100px',
            'index'  => 'position'
        ));

        return parent::_prepareColumns();
    }

    /**
     * @return $this
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('domain');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'   => Mage::helper('exam_domain')->__('Delete'),
            'url'     => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('exam_domain')->__('Are you sure?')
        ));

        $this->getMassactionBlock()->addItem('is_active', array(
            'label'      => Mage::helper('exam_domain')->__('Change status'),
            'url'        => $this->getUrl('*/*/massStatus', array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name'   => 'is_active',
                    'type'   => 'select',
                    'class'  => 'required-entry',
                    'label'  => Mage::helper('exam_domain')->__('Status'),
                    'values' => Mage::getSingleton('adminhtml/system_config_source_enabledisable')->toOptionArray()
                )
            )
        ));

        return $this;
    }

    /**
     * Get row URL on click
     *
     * @param $row
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}