<?php
class Mivec_Product_Block_Adminhtml_Quote_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId("quoteGrid");
        $this->setDefaultSort("id");
        $this->setDefaultDir("DESC");
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel("product/quote")->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn("id" , array(
            "header"    => "ID",
            "align"     => "left",
            "width"     => "50px",
            "index"     => 'id'
        ));

        $this->addColumn("title" ,array(
            "header"    => "Title",
            "align"     => "left",
            "width"     => "150px",
            "index"     => "title"
        ));

        //get group
        $_groups = $this->helper("product/group");
        $this->addColumn("customer_group" , array(
            "header"    => "Permit Customer Group",
            'algin'     => "left",
            "width"     => "200px",
            'index'     => "customer_group",
            "type"      => "options",
            'options'   => $_groups->toOptions()
        ));

        $this->addColumn("updated_at" , array(
            "header"    => "Updated",
            "align"     => "left",
            "type"      => "date",
            "width"     => "50px",
            "index"     => "updated_at"
        ));

        $this->addColumn('action',
            array(
                'header'    =>  'Action',
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => 'Edit',
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                    ,array(
                        'caption'   => 'Delete',
                        'url'       => array('base'=> '*/*/delete'),
                        'field'     => 'id',
                        'confirm'   => 'Are you sure?'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
            ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        //return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}